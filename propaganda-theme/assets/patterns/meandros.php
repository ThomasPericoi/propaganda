<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2.5);">
    <defs>
        <pattern id='meandros' patternUnits='userSpaceOnUse' width='62' height='68' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--primary)' />
            <path d='M41.845 51.072h3.465v-7.035h-7.076v13.999H52.18V37.21H31.117m0 27.79V37.21M20.389 51.07h-3.466v-7.034H24v13.999H10.055V37.21h21.062m10.728-20.283h3.465v7.035h-7.076V9.964H52.18V30.79H31.117m0-27.789v27.79M20.389 16.927h-3.466v7.035H24V9.964H10.055V30.79h21.062M3 3h56v62H3.126z' stroke-linecap='square' stroke-width='2.5' stroke='var(--white)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#meandros)' />
</svg>