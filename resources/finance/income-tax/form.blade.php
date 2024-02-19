<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('payroll_name_id') }}
            {{ Form::text('payroll_name_id', $incomeTax->payroll_name_id, ['class' => 'form-control' . ($errors->has('payroll_name_id') ? ' is-invalid' : ''), 'placeholder' => 'Payroll Name Id']) }}
            {!! $errors->first('payroll_name_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $incomeTax->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('min_income') }}
            {{ Form::text('min_income', $incomeTax->min_income, ['class' => 'form-control' . ($errors->has('min_income') ? ' is-invalid' : ''), 'placeholder' => 'Min Income']) }}
            {!! $errors->first('min_income', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('max_income') }}
            {{ Form::text('max_income', $incomeTax->max_income, ['class' => 'form-control' . ($errors->has('max_income') ? ' is-invalid' : ''), 'placeholder' => 'Max Income']) }}
            {!! $errors->first('max_income', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tax_rate') }}
            {{ Form::text('tax_rate', $incomeTax->tax_rate, ['class' => 'form-control' . ($errors->has('tax_rate') ? ' is-invalid' : ''), 'placeholder' => 'Tax Rate']) }}
            {!! $errors->first('tax_rate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deduction') }}
            {{ Form::text('deduction', $incomeTax->deduction, ['class' => 'form-control' . ($errors->has('deduction') ? ' is-invalid' : ''), 'placeholder' => 'Deduction']) }}
            {!! $errors->first('deduction', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('details') }}
            {{ Form::text('details', $incomeTax->details, ['class' => 'form-control' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder' => 'Details']) }}
            {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
