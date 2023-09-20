<div class="cd-popup" role="alert">
        <div class="cd-popup-container">
            <p>{{ __('translation.Are You Sure To Delete This Item ?') }}</p>
            <ul class="cd-buttons">
                <li>
                    <a href="#" class="submit-popup-form">{{ __('translation.Yes') }}</a>
                    <form method="POST" action="">
                        @csrf
                        @method('delete')
                    </form>
                </li>
                <li><a href="#" class="close-popup" >{{ __('translation.No') }}</a></li>
            </ul>
            <a href="#0" class="cd-popup-close img-replace">Close</a>
        </div> <!-- cd-popup-container -->
    </div>
