
<div class="card is-wide">
    <header class="card-header">
        <p class="card-header-title">تعديل البيانات</p>
    </header>

    <div class="card-content">
        <form class="register-form" id="form-member-register mt-3" method="POST" action="{{route('me.update')}}" accept-charset="UTF-8">

            @csrf

            <div class="field is-horizontal">

                <div class="field-body">
                    <div class="field">
                        <p class="control {{ form_error_class('firstname', $errors) }}">
                            <input type="text" class="input" name="firstname" placeholder="ادخل اسمك الاول" value="{{ old('firstname',user()->firstname) }}"
                                   autofocus>
                        </p>
                        {!! form_error_message('firstname', $errors,'help is-danger') !!}
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">

                <div class="field-body">
                    <div class="field">
                        <p class="control {{ form_error_class('lastname', $errors) }}">
                            <input type="text" class="input" name="lastname" placeholder="ادخل الاسم الاخير" value="{{ old('lastname',user()->lastname) }}">
                        </p>
                        {!! form_error_message('firstname', $errors,'help is-danger') !!}
                    </div>
                </div>
            </div>


            <div class="field is-horizontal">

                <div class="field-body">
                    <div class="field  {{ form_error_class('email', $errors) }}">
                        <p class="control">
                            <input type="text" class="input" id="id-email" name="email" placeholder="البريد الالكتروني" value="{{old('email',user()->email) }}">
                        </p>
                        {!! form_error_message('email', $errors,'help is-danger') !!}
                    </div>
                </div>
            </div>

            <hr/>
            <div class="field is-horizontal">

                <div class="field-body">
                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-success button-main btn-submit">
                                تحديث بياناتي
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>