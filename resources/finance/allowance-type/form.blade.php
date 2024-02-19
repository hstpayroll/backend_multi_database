<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('main_allowance_id') }}
            {{ Form::text('main_allowance_id', $allowanceType->main_allowance_id, ['class' => 'form-control' . ($errors->has('main_allowance_id') ? ' is-invalid' : ''), 'placeholder' => 'Main Allowance Id']) }}
            {!! $errors->first('main_allowance_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $allowanceType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('taxability') }}
            {{ Form::text('taxability', $allowanceType->taxability, ['class' => 'form-control' . ($errors->has('taxability') ? ' is-invalid' : ''), 'placeholder' => 'Taxability']) }}
            {!! $errors->first('taxability', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tax_free_amount') }}
            {{ Form::text('tax_free_amount', $allowanceType->tax_free_amount, ['class' => 'form-control' . ($errors->has('tax_free_amount') ? ' is-invalid' : ''), 'placeholder' => 'Tax Free Amount']) }}
            {!! $errors->first('tax_free_amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('value_type') }}
            {{ Form::text('value_type', $allowanceType->value_type, ['class' => 'form-control' . ($errors->has('value_type') ? ' is-invalid' : ''), 'placeholder' => 'Value Type']) }}
            {!! $errors->first('value_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $allowanceType->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('company_id') }}
            {{ Form::text('company_id', $allowanceType->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company Id']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>