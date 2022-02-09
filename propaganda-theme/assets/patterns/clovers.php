<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='clovers' patternUnits='userSpaceOnUse' width='20' height='20' transform-origin='<?php echo $args['transform-origin']; ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration']; ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--secondary)' />
            <path d='M18.822 18.717s.077-1.396-.737-2.21c-.813-.813-2.21-.736-2.21-.736s-.076 1.396.737 2.21c.814.813 2.21.736 2.21.736zm0-17.643s-1.396-.077-2.21.736c-.813.814-.736 2.21-.736 2.21s1.396.077 2.21-.736c.813-.814.736-2.21.736-2.21zM3.389 17.98c.813-.813.736-2.21.736-2.21s-1.396-.076-2.21.737c-.813.814-.736 2.21-.736 2.21s1.396.077 2.21-.737zm.736-13.96s.077-1.396-.736-2.21c-.814-.813-2.21-.736-2.21-.736s-.077 1.396.736 2.21c.814.813 2.21.736 2.21.736z' stroke-linecap='square' stroke-width='1' stroke='var(--white)' fill='none' />
            <path d='M15.833 9.896s-.932-1.042-2.083-1.042c-1.15 0-2.083 1.042-2.083 1.042s.932 1.041 2.083 1.041c1.15 0 2.083-1.041 2.083-1.041zm-7.5 0S7.401 8.854 6.25 8.854c-1.15 0-2.083 1.042-2.083 1.042s.932 1.041 2.083 1.041c1.15 0 2.083-1.041 2.083-1.041zm2.709-3.75c0-1.15-1.042-2.083-1.042-2.083s-1.042.932-1.042 2.083C8.958 7.296 10 8.229 10 8.229s1.042-.933 1.042-2.083zm-2.084 7.5c0 1.15 1.042 2.083 1.042 2.083s1.042-.933 1.042-2.083c0-1.15-1.042-2.083-1.042-2.083s-1.042.932-1.042 2.083z' stroke-linecap='square' stroke-width='1' stroke='var(--white)' fill='none' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#clovers)' />
</svg>