@props(['name', 'value' => ''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <textarea name={{ $name }} id={{ $name }} class="editor form-control" rows="5">{!! old($name, $value) !!}</textarea>
    <x-error-msg :name="$name" />
</x-form.input-wrapper>
