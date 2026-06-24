<div>
    <button {{ $attributes->merge(['type' => 'submit','class' => 'btn','style' => 'color:blue;',]) }} >


        {{ $slot }}


    </button>
</div>


