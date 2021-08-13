<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='san-kuzushi' patternUnits='userSpaceOnUse' width='60' height='60' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M10 60V30m10 0v30m10 0H0V30M50 0v30m-10 0V0M30 0h30v30M30 40h30m0 10H30m0-20h30v30H30zM0 10h30m0 10H0M0 0h30v30H0z' stroke-width='5' stroke='var(--secondary)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#san-kuzushi)' />
</svg>