<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $company->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $company->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tin') }}
            {{ Form::text('tin', $company->tin, ['class' => 'form-control' . ($errors->has('tin') ? ' is-invalid' : ''), 'placeholder' => 'Tin']) }}
            {!! $errors->first('tin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('logo') }}
            {{ Form::text('logo', $company->logo, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'Logo']) }}
            {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('website') }}
            {{ Form::text('website', $company->website, ['class' => 'form-control' . ($errors->has('website') ? ' is-invalid' : ''), 'placeholder' => 'Website']) }}
            {!! $errors->first('website', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('currency_id') }}
            {{ Form::text('currency_id', $company->currency_id, ['class' => 'form-control' . ($errors->has('currency_id') ? ' is-invalid' : ''), 'placeholder' => 'Currency Id']) }}
            {!! $errors->first('currency_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('calendar_id') }}
            {{ Form::text('calendar_id', $company->calendar_id, ['class' => 'form-control' . ($errors->has('calendar_id') ? ' is-invalid' : ''), 'placeholder' => 'Calendar Id']) }}
            {!! $errors->first('calendar_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $company->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>