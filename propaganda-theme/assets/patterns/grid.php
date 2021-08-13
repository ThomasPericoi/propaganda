<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='grid' patternUnits='userSpaceOnUse' width='20' height='20' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M 10,-2.55e-7 V 20 Z M -1.1677362e-8,10 H 20 Z' stroke-width='2' stroke='var(--primary)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#grid)' />
</svg>