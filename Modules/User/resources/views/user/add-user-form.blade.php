{{ html()->form('POST', route('user.store'))->class('needs-validation')->attributes(['novalidate'])->open() }}

@isset($user)
    {{ html()->hidden('id', $user->id) }}
@endisset

<div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Name')->for('name') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->text('name')->value($user->name ?? old('name'))->class('form-control')->placeholder('Enter Name')->required() }}
                {{ html()->div('Please enter a name.')->class('invalid-feedback') }}
            </div>
        </div>

        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Email')->for('email') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->email('email')->value($user->email ?? old('email'))->class('form-control')->placeholder('Enter Email')->required() }}
                {{ html()->div('Please enter a email.')->class('invalid-feedback') }}
            </div>
        </div>

        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Password')->for('password') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->password('password')->class('form-control')->placeholder('Enter Password')->required(!isset($user)) }}
                {{ html()->div('Please enter a password.')->class('invalid-feedback') }}
            </div>
        </div>

        <div class="col-sm-12">
            <div class="mb-3">
                {{ html()->label('Confirm Password')->for('password_confirmation') }}
                {{ html()->span('*')->class('text-danger') }}
                {{ html()->password('password_confirmation')->class('form-control')->placeholder('Enter Password')->required(!isset($user)) }}
                {{ html()->div('Please enter a password.')->class('invalid-feedback') }}
            </div>
        </div>

        <div class="col-sm-12">
            <div>
                <div class="form-check mb-2">
                    {{ html()->checkbox('is_admin')->value(1)->class('form-check-input')->checked(isset($user) && $user->is_admin ? true : false) }}
                    {{ html()->label('Is Admin?')->for('is_admin')->class('form-check-label') }}
                </div>
            </div>
        </div>

        <x-form-buttons :href="route('user.index')" :label="isset($user) ? 'Update' : 'Create'" />
    </div>
</div>
{{ html()->form()->close() }}
