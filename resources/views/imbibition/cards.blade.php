@for($x = 0; $x < count($labels); $x++)


    @include('imbibition.card',[
        'label' => ucfirst($labels[$x]),
        'color' => $colors[$x],
        'var' => $vars[$x],
    ])

@endfor