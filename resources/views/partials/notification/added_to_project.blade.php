<a  class="dropdown-item" href="{{route('projects.show',$notification->data['project']['id'])}}">
    {{$notification->data['user']['name']}} added  {{$notification->data['tester']['name']}} user to {{$notification->data['project']['pj_name']}} Project
</a>
