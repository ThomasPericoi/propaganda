<svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' class="svg-background" style="transform:scale(2);">
    <defs>
        <pattern id='bells' patternUnits='userSpaceOnUse' width='50' height='50' transform-origin='<?php echo $args['transform-origin'] ?>'>
            <?php if ($args['animated']) : ?>
                <animateTransform attributeType="xml" attributeName="patternTransform" type="rotate" from="0" to="360" begin="0" dur="<?php echo $args['animation-duration'] ?>s" repeatCount="indefinite"></animateTransform>
            <?php endif; ?>
            <rect x='0' y='0' width='100%' height='100%' fill='var(--white)' />
            <path d='M31.325 49.123s3.29 1.628 3.123 6.91a.332.332 0 01-.531.266l-1.86-1.329-1.629.831c-.265.133-.531-.133-.431-.432.564-1.23 1.461-3.72 1.328-6.246zm-5.415-5.415s-1.628-3.29-6.91-3.123a.332.332 0 00-.266.531l1.329 1.86-.83 1.629c-.134.266.132.531.431.432 1.23-.565 3.754-1.429 6.246-1.33zm5.482.83l-.897-.897c-.2-.199-.532-.199-.731 0l-.897.897c-.2.2-.2.532 0 .731l.897.897c.2.2.532.2.73 0l.898-.897c.2-.2.2-.531 0-.73zm.399 1.396c-.897.1-1.363 1.096-.798 1.794a9.75 9.75 0 003.721 2.857l.233.1c.797.332 1.727 0 2.06-.798l.432-1.03c.332-.797 0-1.727-.798-2.06l-.232-.1a9.497 9.497 0 00-4.618-.763zm-2.658-2.658c-.1.897-1.097 1.362-1.794.797a9.75 9.75 0 01-2.858-3.72l-.1-.233c-.331-.798 0-1.728.798-2.06l1.03-.432c.797-.332 1.728 0 2.06.797l.1.233a9.497 9.497 0 01.764 4.618zM-6.325 24.123s-3.29 1.628-3.123 6.91c0 .266.299.433.531.266l1.86-1.329 1.629.831c.265.133.531-.133.431-.432-.564-1.23-1.461-3.72-1.328-6.246zm5.415-5.415S.718 15.418 6 15.585c.266 0 .432.299.266.531l-1.329 1.86.83 1.629c.134.266-.132.531-.431.432-1.23-.565-3.754-1.429-6.246-1.33zm-5.482.83l.897-.897c.2-.199.532-.199.731 0l.897.897c.2.2.2.532 0 .731l-.897.897c-.2.2-.532.2-.73 0l-.898-.897c-.2-.2-.2-.531 0-.73zm-.399 1.396c.897.1 1.363 1.096.798 1.794a9.75 9.75 0 01-3.721 2.857l-.233.1c-.797.332-1.727 0-2.06-.798l-.432-1.03c-.332-.797 0-1.727.798-2.06l.232-.1a9.497 9.497 0 014.618-.763zm2.658-2.658c.1.897 1.097 1.362 1.794.797a9.75 9.75 0 002.858-3.72l.1-.233c.331-.798 0-1.728-.798-2.06l-1.03-.432c-.797-.332-1.728 0-2.06.797l-.1.233a9.497 9.497 0 00-.764 4.618zm47.808 5.847s-3.29 1.628-3.123 6.91c0 .266.299.433.531.266l1.86-1.329 1.629.831c.265.133.531-.133.431-.432-.564-1.23-1.461-3.72-1.328-6.246zm5.415-5.415s1.628-3.29 6.91-3.123c.266 0 .432.299.266.531l-1.329 1.86.83 1.629c.134.266-.132.531-.431.432-1.23-.565-3.754-1.429-6.246-1.33zm-5.482.83l.897-.897c.2-.199.532-.199.731 0l.897.897c.2.2.2.532 0 .731l-.897.897c-.2.2-.532.2-.73 0l-.898-.897c-.2-.2-.2-.531 0-.73zm-.399 1.396c.897.1 1.363 1.096.798 1.794a9.75 9.75 0 01-3.721 2.857l-.233.1c-.797.332-1.727 0-2.06-.798l-.432-1.03c-.332-.797 0-1.727.798-2.06l.232-.1a9.497 9.497 0 014.618-.763zm2.658-2.658c.1.897 1.097 1.362 1.794.797a9.75 9.75 0 002.858-3.72l.1-.233c.331-.798 0-1.728-.798-2.06l-1.03-.432c-.797-.332-1.728 0-2.06.797l-.1.233a9.497 9.497 0 00-.764 4.618zM31.325-.877s3.29 1.628 3.123 6.91a.332.332 0 01-.531.266l-1.86-1.329-1.629.831c-.265.133-.531-.133-.431-.432.564-1.23 1.461-3.72 1.328-6.246zM25.91-6.292S24.282-9.582 19-9.415a.332.332 0 00-.266.531l1.329 1.86-.83 1.629c-.134.266.132.531.431.432 1.23-.565 3.754-1.429 6.246-1.33zm5.482.83l-.897-.897c-.2-.199-.532-.199-.731 0l-.897.897c-.2.2-.2.532 0 .731l.897.897c.2.2.532.2.73 0l.898-.897c.2-.2.2-.531 0-.73zm.399 1.396c-.897.1-1.363 1.096-.798 1.794A9.75 9.75 0 0034.714.585l.233.1c.797.332 1.727 0 2.06-.798l.432-1.03c.332-.797 0-1.727-.798-2.06l-.232-.1a9.497 9.497 0 00-4.618-.763zm-2.658-2.658c-.1.897-1.097 1.362-1.794.797a9.75 9.75 0 01-2.858-3.72l-.1-.233c-.331-.798 0-1.728.798-2.06l1.03-.432c.797-.332 1.728 0 2.06.797l.1.233a9.497 9.497 0 01.764 4.618z' stroke-width='1' stroke='none' fill='var(--primary)' />
            <path d='M24.847 60.851c.166-1.362.565-2.625 1.23-3.754.398-.731.963-1.362 1.56-1.96l1.13-1.13c2.093-2.093 2.293-5.548.3-7.741-2.127-2.326-5.782-2.392-7.974-.2l-1.23 1.23a10.532 10.532 0 01-1.927 1.528c-1.13.665-2.392 1.063-3.754 1.23-.232.033-.432.033-.631.033l-1.063 1.063c-.432.432 1.76 3.289 4.884 6.412 3.123 3.123 5.98 5.316 6.412 4.884l1.063-1.063c-.033-.1-.033-.3 0-.532zm-24.694-25c-.166-1.362-.565-2.625-1.23-3.754-.398-.731-.963-1.362-1.56-1.96l-1.13-1.13c-2.093-2.093-2.293-5.548-.3-7.741 2.127-2.326 5.782-2.392 7.974-.2l1.23 1.23c.598.598 1.229 1.096 1.927 1.528 1.13.665 2.392 1.063 3.754 1.23.232.033.432.033.631.033l1.063 1.063c.432.432-1.76 3.289-4.884 6.412-3.123 3.123-5.98 5.316-6.412 4.884L.153 36.383c.033-.1.033-.3 0-.532zm50 0c-.166-1.362-.565-2.625-1.23-3.754-.398-.731-.963-1.362-1.56-1.96l-1.13-1.13c-2.093-2.093-2.293-5.548-.3-7.741 2.127-2.326 5.782-2.392 7.974-.2l1.23 1.23c.598.598 1.229 1.096 1.927 1.528 1.13.665 2.392 1.063 3.754 1.23.232.033.432.033.631.033l1.063 1.063c.432.432-1.76 3.289-4.884 6.412-3.123 3.123-5.98 5.316-6.412 4.884l-1.063-1.063c.033-.1.033-.3 0-.532zm-25.306-25c.166-1.362.565-2.625 1.23-3.754.398-.731.963-1.362 1.56-1.96l1.13-1.13c2.093-2.093 2.293-5.548.3-7.741-2.127-2.326-5.782-2.392-7.974-.2l-1.23 1.23a10.532 10.532 0 01-1.927 1.528c-1.13.665-2.392 1.063-3.754 1.23a4.236 4.236 0 01-.631.033L12.488 1.15c-.432.432 1.76 3.289 4.884 6.412 3.123 3.123 5.98 5.316 6.412 4.884l1.063-1.063c-.033-.1-.033-.3 0-.532z' stroke-width='1' stroke='none' fill='var(--secondary)' />
        </pattern>
    </defs>
    <rect width='100%' height='100%' fill='url(#bells)' />
</svg>