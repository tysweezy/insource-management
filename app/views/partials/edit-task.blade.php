<div class="modal fade" id="edit-task-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Custom Task</h4>
            </div>
            <div class="modal-body">

				@if ($errors->any())
    				<ul class="alert alert-danger">
        	        @foreach ($errors->all() as $error)
            			<li>{{ $error }}</li>
        	        @endforeach
    				</ul>
	            @endif 
                
                {{ Form::model($task, ['url' => 'user/' . $user->id . '/tasks/edit', 'method' => 'post',  $task->id]) }}

                    <div class="form-group">
                        {{ Form::label('task_name', 'Task Name') }}
                        {{ Form::text('task_name', null, ['class'  => 'form-control', 'placeholder' => 'Task Name']) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('deadline', 'Deadline') }}
                        {{ Form::input('date', 'deadline', null, ['class' => 'form-control']) }}
                        
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Create Custom Task', ['class' => 'btn btn-primary']) }}
                    </div>

                {{ Form::close() }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->