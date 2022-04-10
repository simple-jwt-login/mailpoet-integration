jQuery(document).ready(
    function ($) {
        const shortcode = 'custom:simple-jwt-login';
        const shortCodePreview = document.getElementById('simple-jwt-login-mailpoet-short-code');
        const linkPreview = document.getElementById('simple-jwt-login-mailport-preview');

        renderCode();

        $('#simple-jwt-login-mailpoet .input').keyup(function () {
            renderCode();
        });

        /**
         * Sanitize text that will be rendered in the shortcode
         * @param string text
         * @returns string
         */
        function sanitizeText(text) {
            //Remove all tags
            text = text.replace(/<\/?[^>]+(>|$)/g, "");
            return text;
        }

        /**
         * Generates code from html element value
         * @param id Id of the HTML element
         * @param code Initial short code
         * @param codeParameter Name for the shortcode parameter
         * @param link Initial preview link
         * @param linkParameter Link parameter
         * @returns {*[]} Array of [code, link]
         */
        function addCodeParameter(id, code, codeParameter, link, linkParameter) {
            let text = $('#simple-jwt-login-mailpoet #' + id).val();
            if (text != '') {
                code += ' ' + codeParameter + '="' + sanitizeText(text) + '"';
                if (typeof link !== 'undefined' && typeof linkParameter !== undefined) {
                    link[linkParameter] = text;
                }
            }
            return [code, link];
        }

        function renderCode() {
            let link = document.createElement('a');
            link.href = "javascript:void(0)";

            let code = '[' + shortcode;

            [code, link] = addCodeParameter('text-value', code, 'text', link, 'text');
            [code, link] = addCodeParameter('class-value', code, 'class', link, 'className');
            [code, link] = addCodeParameter('class-style', code, 'style', link, 'style');
            [code, link] = addCodeParameter('text-jwt-validity', code, 'validity', link);
            [code, link] = addCodeParameter('text-redirectUrl', code, 'redirectUrl', link);
            [code, link] = addCodeParameter('text-auth-code', code, 'authCode', link);

            code += ']';
            linkPreview.innerHTML = '';
            linkPreview.appendChild(link);
            shortCodePreview.innerHTML = code;
        }

        $('#simple-jwt-login-mailpoet .copy-button').on(
            'click',
            function (e) {
                e.preventDefault();
                let simpleJWTCopyText = $('#simple-jwt-login-mailpoet-short-code').html();
                simpleJWTCopyText = simpleJWTCopyText.trim().replace(/&amp;/gmi, '&');
                let tempJWTLoginCopyInput = $("<input>");
                $("body").append(tempJWTLoginCopyInput);
                tempJWTLoginCopyInput.val(simpleJWTCopyText, '&').select();
                document.execCommand("copy");
                tempJWTLoginCopyInput.remove();
                tempJWTLoginCopyInput = null;
            }
        );
    }(jQuery)
);
