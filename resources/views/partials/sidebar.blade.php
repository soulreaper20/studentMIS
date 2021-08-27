<div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="navbar-nav ml-auto">
                       @if(Auth::user()->role =='superAdmin')
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('faculty.index') }}">Faculty</a>
                      </li>
                      @endif
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.index') }}">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.index') }}">Teachers</a>
                      </li>
                    </ul>
                </div>
            </div>