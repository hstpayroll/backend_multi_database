<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">


                <div class="form-group">
                    {{ Form::label('emp_id') }}
                    {{ Form::text('emp_id', $employee->emp_id, ['class' => 'form-control' . ($errors->has('emp_id') ? ' is-invalid' : ''), 'placeholder' => 'Emp Id']) }}
                    {!! $errors->first('emp_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('first_name') }}
                    {{ Form::text('first_name', $employee->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
                    {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('father_name') }}
                    {{ Form::text('father_name', $employee->father_name, ['class' => 'form-control' . ($errors->has('father_name') ? ' is-invalid' : ''), 'placeholder' => 'Father Name']) }}
                    {!! $errors->first('father_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('gfather_name') }}
                    {{ Form::text('gfather_name', $employee->gfather_name, ['class' => 'form-control' . ($errors->has('gfather_name') ? ' is-invalid' : ''), 'placeholder' => 'Gfather Name']) }}
                    {!! $errors->first('gfather_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('sex') }}
                    {{ Form::text('sex', $employee->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : ''), 'placeholder' => 'Sex']) }}
                    {!! $errors->first('sex', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('birth_date') }}
                    {{ Form::date('birth_date', $employee->birth_date, ['class' => 'form-control' . ($errors->has('birth_date') ? ' is-invalid' : ''), 'placeholder' => 'Birth Date']) }}
                    {!! $errors->first('birth_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('hired_date') }}
                    {{ Form::date('hired_date', $employee->hired_date, ['class' => 'form-control' . ($errors->has('hired_date') ? ' is-invalid' : ''), 'placeholder' => 'Hired Date']) }}
                    {!! $errors->first('hired_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('tin_no') }}
                    {{ Form::text('tin_no', $employee->tin_no, ['class' => 'form-control' . ($errors->has('tin_no') ? ' is-invalid' : ''), 'placeholder' => 'Tin No']) }}
                    {!! $errors->first('tin_no', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('cost_center') }}
                    {{ Form::text('cost_center', $employee->cost_center, ['class' => 'form-control' . ($errors->has('cost_center') ? ' is-invalid' : ''), 'placeholder' => 'Cost Center']) }}
                    {!! $errors->first('cost_center', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('tax_region_id') }}
                    {{ Form::text('tax_region_id', $employee->tax_region_id, ['class' => 'form-control' . ($errors->has('tax_region_id') ? ' is-invalid' : ''), 'placeholder' => 'Tax Region Id']) }}
                    {!! $errors->first('tax_region_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('grade_id') }}
                    {{ Form::text('grade_id', $employee->grade_id, ['class' => 'form-control' . ($errors->has('grade_id') ? ' is-invalid' : ''), 'placeholder' => 'Grade Id']) }}
                    {!! $errors->first('grade_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">

                <div class="form-group">
                    {{ Form::label('department_id') }}
                    {{ Form::text('department_id', $employee->department_id, ['class' => 'form-control' . ($errors->has('department_id') ? ' is-invalid' : ''), 'placeholder' => 'Department Id']) }}
                    {!! $errors->first('department_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('sub_department_id') }}
                    {{ Form::text('sub_department_id', $employee->sub_department_id, ['class' => 'form-control' . ($errors->has('sub_department_id') ? ' is-invalid' : ''), 'placeholder' => 'Sub Department Id']) }}
                    {!! $errors->first('sub_department_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('position_id') }}
                    {{ Form::text('position_id', $employee->position_id, ['class' => 'form-control' . ($errors->has('position_id') ? ' is-invalid' : ''), 'placeholder' => 'Position Id']) }}
                    {!! $errors->first('position_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('employment_type_id') }}
                    {{ Form::text('employment_type_id', $employee->employment_type_id, ['class' => 'form-control' . ($errors->has('employment_type_id') ? ' is-invalid' : ''), 'placeholder' => 'Employment Type Id']) }}
                    {!! $errors->first('employment_type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('citizenship_id') }}
                    {{ Form::text('citizenship_id', $employee->citizenship_id, ['class' => 'form-control' . ($errors->has('citizenship_id') ? ' is-invalid' : ''), 'placeholder' => 'Citizenship Id']) }}
                    {!! $errors->first('citizenship_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('company_id') }}
                    {{ Form::text('company_id', $employee->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company Id']) }}
                    {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::text('email', $employee->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('bank_id') }}
                    {{ Form::text('bank_id', $employee->bank_id, ['class' => 'form-control' . ($errors->has('bank_id') ? ' is-invalid' : ''), 'placeholder' => 'Bank Id']) }}
                    {!! $errors->first('bank_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('account_number') }}
                    {{ Form::text('account_number', $employee->account_number, ['class' => 'form-control' . ($errors->has('account_number') ? ' is-invalid' : ''), 'placeholder' => 'Account Number']) }}
                    {!! $errors->first('account_number', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('image') }}
                    {{ Form::text('image', $employee->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('comment') }}
                    {{ Form::text('comment', $employee->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
                    {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
