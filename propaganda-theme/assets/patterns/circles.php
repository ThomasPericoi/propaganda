<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2.5);">
    <defs>
        <pattern id='circles' patternUnits='userSpaceOnUse' width='40' height='40' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M40 45a5 5 0 110-10 5 5 0 010 10zM0 45a5 5 0 110-10 5 5 0 010 10zM0 5A5 5 0 110-5 5 5 0 010 5zm40 0a5 5 0 110-10 5 5 0 010 10z' stroke-width='1' stroke='none' fill='var(--secondary)' />
            <path d='M20 25a5 5 0 110-10 5 5 0 010 10z' stroke-width='1' stroke='none' fill='var(--primary)' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#circles)' />
</svg>