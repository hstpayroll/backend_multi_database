<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('loan_id') }}
            {{ Form::text('loan_id', $loanRate->loan_id, ['class' => 'form-control' . ($errors->has('loan_id') ? ' is-invalid' : ''), 'placeholder' => 'Loan Id']) }}
            {!! $errors->first('loan_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rate') }}
            {{ Form::text('rate', $loanRate->rate, ['class' => 'form-control' . ($errors->has('rate') ? ' is-invalid' : ''), 'placeholder' => 'Rate']) }}
            {!! $errors->first('rate', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>