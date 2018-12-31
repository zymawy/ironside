<form action="{{ route('me.update.changepassword') }}" method="POST">
    @csrf
    <div class="field is-horizontal">
        <div class="field-body">
            <div class="field  {{ form_error_class('current-password', $errors) }}">
                <p class="control">
                    <input type="password" class="input" id="id-current-password" name="current-password"
                           placeholder="ادخل كلمة المرور القديمة في حال اردت تغير كلمة المرور"
                           value="{{ old('current-password') }}">
                </p>
                {!! form_error_message('current-password', $errors,'help is-danger') !!}
            </div>
        </div>
    </div>

    <div class="field is-horizontal">

        <div class="field-body">
            <div class="field  {{ form_error_class('new-password', $errors) }}">
                <p class="control">
                    <input type="password" class="input" id="id-password" name="new-password" placeholder="ادخل كلمة المرور"
                           value="{{ old('new-password') }}">
                </p>
                {!! form_error_message('new-password', $errors,'help is-danger') !!}
            </div>
        </div>
    </div>

    <div class="field is-horizontal {{ form_error_class('new-password_confirmation', $errors) }}">

        <div class="field-body">
            <div class="field  {{ form_error_class('new-password_confirmation', $errors) }}">
                <p class="control">
                    <input type="password" class="input" id="id-password_confirmation" name="new-password_confirmation"
                           placeholder="تأكيد كلمة المرور" value="{{ old('new-password_confirmation') }}">
                </p>
                {!! form_error_message('new-password_confirmation', $errors,'help is-danger') !!}
            </div>
        </div>
    </div>

    <hr/>
    <div class="field is-horizontal">

        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-success button-main btn-submit">
                        <b-icon icon="lock-open"></b-icon>
                       تغير كلمة المرور
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</form>