<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('loan_id') }}
            {{ Form::text('loan_id', $loanPaymentRecord->loan_id, ['class' => 'form-control' . ($errors->has('loan_id') ? ' is-invalid' : ''), 'placeholder' => 'Loan Id']) }}
            {!! $errors->first('loan_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount_payed') }}
            {{ Form::text('amount_payed', $loanPaymentRecord->amount_payed, ['class' => 'form-control' . ($errors->has('amount_payed') ? ' is-invalid' : ''), 'placeholder' => 'Amount Payed']) }}
            {!! $errors->first('amount_payed', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('outstanding_amount') }}
            {{ Form::text('outstanding_amount', $loanPaymentRecord->outstanding_amount, ['class' => 'form-control' . ($errors->has('outstanding_amount') ? ' is-invalid' : ''), 'placeholder' => 'Outstanding Amount']) }}
            {!! $errors->first('outstanding_amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_partial') }}
            {{ Form::text('is_partial', $loanPaymentRecord->is_partial, ['class' => 'form-control' . ($errors->has('is_partial') ? ' is-invalid' : ''), 'placeholder' => 'Is Partial']) }}
            {!! $errors->first('is_partial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_missed') }}
            {{ Form::text('is_missed', $loanPaymentRecord->is_missed, ['class' => 'form-control' . ($errors->has('is_missed') ? ' is-invalid' : ''), 'placeholder' => 'Is Missed']) }}
            {!! $errors->first('is_missed', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
