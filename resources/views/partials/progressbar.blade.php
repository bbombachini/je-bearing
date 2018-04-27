<!-- Progress Bar to be future implemented -->
<div class="progress-bar-con">
    <ul class="progress-bar">
      <a href="{{ url('/admin/part/edit/')}}/{{ session('partId') }}" id="progress-one"><li>Part Details</li></a>
      <a href="{{ url('/admin/part/add/operation/')}}/{{ session('partId') }}" id="progress-two"><li>Operations</li></a>
      <a href="#" id="progress-three"><li >Quality Alerts</li></a>
    </ul>
    <hr id="progress-line">
</div>
