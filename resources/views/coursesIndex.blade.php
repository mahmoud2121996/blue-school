@extends( (Auth::user()->is_admin == 1 ) ? 'layouts.admin' : 'layouts.student')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            List Of Courses
        </div>
        <div class="courses-list">
            @foreach ($courses as $course)
            <div class="card-body">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$course->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Credit Hours : {{$course->credit_hours}}</h6>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal-{{$course->id}}">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{$course->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$course->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>Credit Hours : {{$course->credit_hours}}</div>
                                        <div>Description : {{$course->description}}</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->is_admin == 1)
                        <a href="{{ route('editCourse',['id'=>$course->id]) }}"><button type="button"
                                class="btn btn-secondary">update</button> </a>
                        <div class="action-form">
                            <form action="{{ route('deleteCourse',['id'=>$course->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        

                        @elseif(Auth::user()->is_admin == 0)
                        
                        @if($enrolledCourses->find($course->id))

                        

                        <div class="action-form">
                            <form action="{{ route('dropCourse')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button type="submit" class="btn btn-danger">Drop</button>
                            </form>
                        </div>

                        @else
                        <div class="action-form">
                            <form action="{{ route('enrollCourse')}}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button type="submit" class="btn btn-success">Enroll</button>
                            </form>
                        </div>

                        @endif

                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection