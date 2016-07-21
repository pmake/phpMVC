@extends('layouts.app')

@section('content_1')

    <!-- TODO: Bootstrap 樣板... -->

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- TODO: 顯示驗證錯誤 -->
                @include("common.errors")
                <!-- 新任務的表單 -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- TODO: 任務名稱 -->
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                            </div>
                        </div>

                        <!-- TODO: 增加任務按鈕-->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i>增加任務
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- 目前任務 -->
                @if(count($tasks)>0)
                    {{--$tasks是由routes的view()的第二個參數傳遞過來的陣列的一個和變數名稱相同的索引的值--}}
                    <div class="panel-heading">
                        Exists Tasks
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    {{--用Task的get方法取得的每一筆資料都以物件的方式儲存，欄位名稱則轉換成屬性名稱--}}
                                    <td class="table-text">{{$task->name}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection