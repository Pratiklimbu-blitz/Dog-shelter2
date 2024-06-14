{{--@can('view',\App\Models\User::class)--}}
<a href="{{ route('volunteers.show', $r->id) }}" class="btn btn-sm btn-icon btn-light-facebook" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
{{--@endcan--}}

{{--@can('destroy',\App\Models\User::class)--}}
<button class="btn btn-icon btn-light-youtube btn-sm ml-1p" onclick="confirmDelete(() => {deleteUser({{$r->id}})})"  title="{{ __('Destroy') }}"><i class="fas fa-trash"></i></button>
{{--@endcan--}}
