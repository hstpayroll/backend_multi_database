<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('income_tax_id') }}
            {{ Form::text('income_tax_id', $payrollPeriod->income_tax_id, ['class' => 'form-control' . ($errors->has('income_tax_id') ? ' is-invalid' : ''), 'placeholder' => 'Income Tax Id']) }}
            {!! $errors->first('income_tax_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $payrollPeriod->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::date('start_date', $payrollPeriod->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end_date') }}
            {{ Form::date('end_date', $payrollPeriod->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
            {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
