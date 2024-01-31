@props([
    "title" => "",
    "message" => "",
    "color" => "",
])

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast {{$color}}" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">{{ $title }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{$message}}
      </div>
    </div>
</div>

<script>

    const toast = document.getElementById('liveToast')

    if (toast) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast)
        toastBootstrap.show()
    }
</script>