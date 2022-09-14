@foreach($chatlists as $chatlist)
    <a href="/chatlists/{{ $chatlist->id }}">
        <li class="border m-3y p-3">Title: {{$chatlist->id}}  </li>
    </a>
    @endforeach