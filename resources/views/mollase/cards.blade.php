@for($x = 0; $x < count($labels); $x++)


    @include('mollase.card',[
        'label' => ucfirst($labels[$x]),
        'color' => $colors[$x],
        'var' => $vars[$x],
    ])

@endfor