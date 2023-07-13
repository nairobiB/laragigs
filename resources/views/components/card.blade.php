<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{$slot}}
    <!-- whatever we pass in will be output here, whatever in slot will be sorrounded by this component-->
</div>
<!-- This is the card component and it will wrap around objects in the page -->