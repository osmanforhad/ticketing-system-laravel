<div class="panel panel-default">

<div class="panel-heading">Add reply</div>

<div class="panel-body">

    <div class="comment-form">
    <from action="{{url('comment')}}" metod="POST" class="form">
    {!! csrf_field() !!}

    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">

    <div class="form-group{{$errors->has('comment') ? 'has-error' : ''}}">
    <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

    @if ($errors->has ('comment'))
        <span class="help-block">
        <strong>{{$errors->first('comment')}}</strong>
        </span>
    @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </from>
    </div>

</div>

</div>