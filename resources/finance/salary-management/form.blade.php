<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $salaryManagement->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reason') }}
            {{ Form::text('reason', $salaryManagement->reason, ['class' => 'form-control' . ($errors->has('reason') ? ' is-invalid' : ''), 'placeholder' => 'Reason']) }}
            {!! $errors->first('reason', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('old_salary') }}
            {{ Form::text('old_salary', $salaryManagement->old_salary, ['class' => 'form-control' . ($errors->has('old_salary') ? ' is-invalid' : ''), 'placeholder' => 'Old Salary']) }}
            {!! $errors->first('old_salary', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('new_salary') }}
            {{ Form::text('new_salary', $salaryManagement->new_salary, ['class' => 'form-control' . ($errors->has('new_salary') ? ' is-invalid' : ''), 'placeholder' => 'New Salary']) }}
            {!! $errors->first('new_salary', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::date('start_date', $salaryManagement->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $salaryManagement->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
