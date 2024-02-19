<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('payroll_date') }}
            {{ Form::text('payroll_date', $allowanceTransaction->payroll_date, ['class' => 'form-control' . ($errors->has('payroll_date') ? ' is-invalid' : ''), 'placeholder' => 'Payroll Date']) }}
            {!! $errors->first('payroll_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $allowanceTransaction->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('allowance_type_id') }}
            {{ Form::text('allowance_type_id', $allowanceTransaction->allowance_type_id, ['class' => 'form-control' . ($errors->has('allowance_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Allowance Type Id']) }}
            {!! $errors->first('allowance_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $allowanceTransaction->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('taxable_amount') }}
            {{ Form::text('taxable_amount', $allowanceTransaction->taxable_amount, ['class' => 'form-control' . ($errors->has('taxable_amount') ? ' is-invalid' : ''), 'placeholder' => 'Taxable Amount']) }}
            {!! $errors->first('taxable_amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('non_taxable_amount') }}
            {{ Form::text('non_taxable_amount', $allowanceTransaction->non_taxable_amount, ['class' => 'form-control' . ($errors->has('non_taxable_amount') ? ' is-invalid' : ''), 'placeholder' => 'Non Taxable Amount']) }}
            {!! $errors->first('non_taxable_amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_day_based') }}
            {{ Form::text('is_day_based', $allowanceTransaction->is_day_based, ['class' => 'form-control' . ($errors->has('is_day_based') ? ' is-invalid' : ''), 'placeholder' => 'Is Day Based']) }}
            {!! $errors->first('is_day_based', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::text('start_date', $allowanceTransaction->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>