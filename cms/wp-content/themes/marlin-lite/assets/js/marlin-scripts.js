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
            $('body,html').animate({scrollTop:0}, 200, 'swing');
            if (!$(".wpcf7-form").valid()) {
                return;
            }
            $('.confirm_page_submit').show();
            $('.form_page_submit').hide();
            $('select, input[type="text"], input[type="email"], input[type="url"], input[type="tel"] ,textarea').attr('readonly', true).addClass('readonly');
            $('.checkbox-privacy, .wpcf7-checkbox, .file_attachment').addClass('none-click');
        });

        $(document).on('click', '#previous', function () {
            $('.confirm_page_submit').hide();
            $('.form_page_submit').show();
            $('select, input[type="text"], input[type="email"], input[type="url"], input[type="tel"], textarea').attr('readonly', false).removeClass('readonly');
            $('.checkbox-privacy, .wpcf7-checkbox, .file_attachment').removeClass('none-click');
        });

        // 確認画面→完了画面
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            setTimeout( () => {
                location = 'https://wakoen.ed.jp/contact/thanks';
            }, 3000 ); // Wait for 3 seconds to redirect.
        }, false );

        $(".wpcf7-form").validate({
            rules: {
                checkbox_title: {
                    required: true,
                },
                text_name: {
                    required: true,
                },
                email_address: {
                    required: true,
                    email: true,
                },
                tel_number: {
                    required: true,
                },
            },
            messages: {
                checkbox_title: {
                    required: "選択してください。",
                },
                text_name: {
                    required: "入力してください。",
                },
                email_address: {
                    required: "入力してください。",
                    email: "メールアドレスの形式で入力してください。",
                },
                tel_number: {
                    required: "入力してください。",
                },
            },
            errorClass: "validation-error",
            errorElement: "p",
            // エラーメッセージを表示する位置
            errorPlacement: function (error, element) {
                error.insertBefore(element)
            },
            onsubmit: false, // 送信ボタン押下時にバリデーションを行わない
            focusInvalid: false, //エラー時にフォーカスしない
        });
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