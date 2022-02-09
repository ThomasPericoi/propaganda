<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(1.5);">
    <defs>
        <pattern id='herringbone' patternUnits='userSpaceOnUse' width='40' height='20' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M40 0L20-10V0l20 10zm0 10L20 0v10l20 10zm0 10L20 10v10l20 10zM0 20l20-10v10L0 30zm0-10L20 0v10L0 20zM0 0l20-10V0L0 10z' stroke-width='2' stroke='var(--secondary)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#herringbone)' />
</svg>