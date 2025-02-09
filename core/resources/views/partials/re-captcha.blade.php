@php
    $googleCaptcha = loadReCaptcha()
@endphp
@if($googleCaptcha)
    <div class="mb-3">
        @php echo $googleCaptcha @endphp
    </div>
@endif
@if($googleCaptcha)
@push('script')
    <script>
        (function($){
            "use strict"
            $('.has-gcaptcha').on('submit',function(){
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    document.getElementById('g-recaptcha-error').innerHTML = '<span class="text__danger">@lang("Captcha field is required.")</span>';
                    return false;
                }
                return true;
            });

            window.verifyCaptcha = () => {
                document.getElementById('g-recaptcha-error').innerHTML = '';
            }
        })(jQuery);
    </script>
@endpush
@endif
