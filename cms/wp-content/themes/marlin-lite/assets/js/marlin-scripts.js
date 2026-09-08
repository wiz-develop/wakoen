(function($){
	"use strict";	
    $(document).ready(function() {
            
        if ( $('.post').length ) { $('.post').fitVids(); }
            
        if ( $('select').length ) { $('select').chosen(); }
		
		// Menu Navigation
        if ( $('.toggle-menu').length ) {
            $('.toggle-menu').click( function(){
                $('#nav-wrapper .vtmenu').toggle();
            } );
        }
        
        $('.vtmenu .caret').click( function() {
            var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
            
            $submenu.toggle();
            
            return false;
        });
        $(window).resize( function() {
            $icon.css({
                'width' : parseFloat( ( 100 / $('.social-footer a').length ) ).toFixed(4) + '%'
            });
        });
		
		// Toggle vtmenu
		$(".nav-toggle").on("click", function(){
			$(this).toggleClass("active");
			$(".vtmenu").slideToggle();
		});
	
		// Fitvids
		$(document).ready(function(){
			$(".container").fitVids();
		});

    });

    // お問い合わせフォーム
    if ($('.contact').length) {
        $('.confirm_page_submit').hide();
        checkSubmitButton();
        
        const today = new Date();
        const maxDays = 30;
        const selectIds = ["visit-date-1", "visit-date-2"];

        selectIds.forEach(function(id) {
            const dateSelect = document.getElementById(id);
            if (dateSelect) {
                dateSelect.innerHTML = '';

                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "見学希望日選択";
                defaultOption.disabled = true;
                defaultOption.selected = true;
                dateSelect.appendChild(defaultOption);

                for (let i = 0; i <= maxDays; i++) {
                    const date = new Date();
                    date.setDate(today.getDate() + i);
                    const day = date.getDay();
                    if (day !== 0 && day !== 6) {
                        const formatted = date.toISOString().split('T')[0];
                        const option = document.createElement("option");
                        option.value = formatted;
                        option.textContent = formatted;
                        dateSelect.appendChild(option);
                    }
                }
            }
        });
        // 生年月日 初期表示（現在の年 - 22年の4月1日）を設定
        const birthdayInput = document.querySelector('.contact__birthday');
        if (birthdayInput) {
            const now = new Date();
            const year = now.getFullYear() - 22;
            const defaultDate = `${year}-04-01`;
            birthdayInput.value = defaultDate;
            birthdayInput.dispatchEvent(new Event('change', { bubbles: true }));
        }

        // 個人情報の取り扱いについて同意チェック変更時
        $('.privacy').on('change', function () {
            checkSubmitButton();
        });
        // 送信ボタン活性非活性切り替え
        function checkSubmitButton() {
            if($('.privacy').prop("checked")) {
                $('#confirmation').prop('disabled', false);
            } else {
                $('#confirmation').prop('disabled', true);
            }
        }

        // ファイルのアップロードサイズを制限する
        fileSizeLimit(1, 'input[name=file_1]');
        fileSizeLimit(1, 'input[name=file_2]');
        fileSizeLimit(1, 'input[name=file_3]');
        fileSizeLimit(3, 'input[name=file_4]');

        function fileSizeLimit(maxFileSize, className) {
            $(className).change(function(){
                let error_text = $(className).prev('.validation-error');
                error_text.remove();
                let uploaded_file=$(this).prop('files')[0];
                let maxFileSizeBite = maxFileSize*1048576;
                if(maxFileSizeBite < uploaded_file.size){
                    $(this).val("");
                    $(this).before("<p class='validation-error'>ファイルサイズが大きすぎます。</p>");
                }
            });
        }

        //確認画面処理
        //入力画面→確認画面
        $(document).on('click', '#confirmation', function () {
            console.log('確認ボタンが押された');
          
            $('.confirm_page_submit').show();
            $('.form_page_submit').hide();
          

            var $visitDate1 = $('[name="visit-date-1"]');
            var visitDate1 = $visitDate1.val();
                    
            $visitDate1.parent().find('.validation-error').remove();

            if (!visitDate1) {
                $visitDate1.addClass('error');
                $('<p class="validation-error">必須項目に入力してください。</p>').appendTo($visitDate1.parent());
                return;
            } else {
                $visitDate1.removeClass('error');
            }

            if (!$(".wpcf7-form").valid()) {
                return;
            }
            $('.confirm_page_submit').show();
            $('.form_page_submit').hide();
            $('select, input[type="text"], input[type="email"], input[type="url"], input[type="tel"] ,input[type="date"],textarea').attr('readonly', true).addClass('readonly');
            $('.checkbox-privacy, .wpcf7-checkbox, .file_attachment').addClass('none-click');
             // チェックボックス・ラジオを無効化
            $('input[type="checkbox"], input[type="radio"]')
                .attr('disabled', true);
        
            // 見た目の無効化クラス
            $('.checkbox-privacy, .wpcf7-checkbox, .file_attachment').addClass('none-click');
            
        });

        $(document).on('click', '#previous', function () {
            $('.confirm_page_submit').hide();
            $('.form_page_submit').show();
            $('select, input[type="text"], input[type="email"], input[type="url"], input[type="tel"], input[type="date"],textarea').attr('readonly', false).removeClass('readonly');
            $('.checkbox-privacy, .wpcf7-checkbox, .file_attachment').removeClass('none-click');
             // 入力のロック解除
            $('select, input[type="text"], input[type="email"], input[type="url"], input[type="tel"], textarea')
                .attr('readonly', false)
                .removeClass('readonly');
        
             // チェックボックス・ラジオ有効化
            $('input[type="checkbox"], input[type="radio"]')
                .attr('disabled', false);
        });

        // 確認画面→完了画面
        document.addEventListener('wpcf7mailsent', function(event) {
            const formId = event.detail.contactFormId;
        
            if (formId == '391') {
                location.href = 'http://wakoen.3d-showcase.net/staff-wanted/thanks/';
            } else if (formId == '397') {
                location.href = 'http://wakoen.3d-showcase.net/visit/thanks/';
            } else {
                location.href = 'http://wakoen.3d-showcase.net/contact/thanks/';
            }
        }, false);

        $(".wpcf7-form").validate({
            rules: {  
              checkbox_title: {        // ← name の末尾に [] は付けない
                required: true,
              },
              text_name:    { required: true },
              email_address:{
                required: true,
                email: true,
              },
              tel_number:   { required: true },
            },
            messages: {
              checkbox_title: { required: "選択してください。" },
              text_name:      { required: "入力してください。" },
              email_address: {
                required: "入力してください。",
                email: "メールアドレスの形式で入力してください。",
              },
              tel_number:     { required: "入力してください。" },
            },
            errorClass:   "validation-error",
            errorElement: "p",
            errorPlacement: function (error, element) {
              error.insertBefore(element);
            },
            onsubmit:     false,
            focusInvalid: false,
          });
          
          /* ── 送信ボタンを押した瞬間に disabled を解除 ─────────────── */
          /* 旧: wpcf7submit イベント  →  新: submit ボタンの click イベント */
          $(document).on("click", ".wpcf7-submit", function () {
            $(this.form).find(":disabled").prop("disabled", false);
          });
          
          /* ── validateRequiredFields（変更なし） ─────────────── */
          function validateRequiredFields() {
            let isValid = true;
          
            $(".contact input[required], .contact textarea[required], .contact select[required]").each(function () {
              const type = $(this).attr("type");
              if (type === "checkbox" || type === "radio") {
                const name = $(this).attr("name");
                if ($('input[name="' + name + '"]:checked').length === 0) {
                  isValid = false;
                  return false;
                }
              } else if (!$(this).val()) {
                isValid = false;
                return false;
              }
            });
          
            // 同意チェック確認
            if (!$(".privacy input[type='checkbox']").is(":checked")) {
              isValid = false;
            }
          
            $("#confirmation").prop("disabled", !isValid);
          }
    }
    /*-------------------------------------------*/
    /* スムーススクロール
    /*-------------------------------------------*/
    var HeaderHeight = $('.site-header').outerHeight(); // ヘッダーの高さを取得
    var speed = 100;
    
    // クリック時のスムーズスクロール
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault(); // デフォルト動作を無効化
    
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - HeaderHeight - 50; // 余白を50px追加
    
        $('body,html').animate({ scrollTop: position }, speed, 'swing');
    });
    
    // ページ読み込み時のアンカー移動
    $(document).ready(function() {
        var urlHash = location.hash;
        if (urlHash) {
            var target = $(urlHash); // ハッシュのターゲット要素を取得
            if (target.length) {
                var position = target.offset().top - HeaderHeight - 50;
                setTimeout(function() {
                    $('body,html').animate({ scrollTop: position }, speed, 'swing');
                }, 100);
            }
        }
    });
})(jQuery);