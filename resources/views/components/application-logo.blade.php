@if(isset($site->logo))
<img src="{{ config('filesystems.disks.s3.url') . '/' . $site->logo }}" width="96" alt="Site Logo">
@endif
