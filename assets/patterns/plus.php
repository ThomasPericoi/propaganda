<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background">
    <defs>
        <pattern id='plus' patternUnits='userSpaceOnUse' width='32' height='32' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M40 16h-6m-4 0h-6m8 8v-6m0-4V8M8 16H2m-4 0h-6m8 8v-6m0-4V8' stroke-linecap='square' stroke-width='2' stroke='var(--primary)' fill='none' />
            <path d='M16-8v6m0 4v6m8-8h-6m-4 0H8m8 24v6m0 4v6m8-8h-6m-4 0H8' stroke-linecap='square' stroke-width='2' stroke='var(--secondary)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#plus)' />
</svg>