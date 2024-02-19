<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $loan->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('loan_type_id') }}
            {{ Form::text('loan_type_id', $loan->loan_type_id, ['class' => 'form-control' . ($errors->has('loan_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Loan Type Id']) }}
            {!! $errors->first('loan_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $loan->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::text('start_date', $loan->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('expected_end_date') }}
            {{ Form::text('expected_end_date', $loan->expected_end_date, ['class' => 'form-control' . ($errors->has('expected_end_date') ? ' is-invalid' : ''), 'placeholder' => 'Expected End Date']) }}
            {!! $errors->first('expected_end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duration_months') }}
            {{ Form::text('duration_months', $loan->duration_months, ['class' => 'form-control' . ($errors->has('duration_months') ? ' is-invalid' : ''), 'placeholder' => 'Duration Months']) }}
            {!! $errors->first('duration_months', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $loan->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $loan->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('termination_date') }}
            {{ Form::text('termination_date', $loan->termination_date, ['class' => 'form-control' . ($errors->has('termination_date') ? ' is-invalid' : ''), 'placeholder' => 'Termination Date']) }}
            {!! $errors->first('termination_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>