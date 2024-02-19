<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('company_id') }}
            {{ Form::text('company_id', $overTimeCalculation->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company Id']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $overTimeCalculation->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('over_time_type_id') }}
            {{ Form::text('over_time_type_id', $overTimeCalculation->over_time_type_id, ['class' => 'form-control' . ($errors->has('over_time_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Over Time Type Id']) }}
            {!! $errors->first('over_time_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ot_date') }}
            {{ Form::date('ot_date', $overTimeCalculation->ot_date, ['class' => 'form-control' . ($errors->has('ot_date') ? ' is-invalid' : ''), 'placeholder' => 'Ot Date']) }}
            {!! $errors->first('ot_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ot_hour') }}
            {{ Form::text('ot_hour', $overTimeCalculation->ot_hour, ['class' => 'form-control' . ($errors->has('ot_hour') ? ' is-invalid' : ''), 'placeholder' => 'Ot Hour']) }}
            {!! $errors->first('ot_hour', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
