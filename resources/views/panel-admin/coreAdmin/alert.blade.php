@if (session('alert'))
<script>
	alert('{{ session('alert') }}');
</script>
@elseif (session('alert-success'))
<script>
	alert('Success!\n' + '{{ session('alert-success') }}');
</script>
@elseif (session('alert-error'))
<script>
	alert('Error!\n' + '{{ session('alert-error') }}');
</script>
@endif