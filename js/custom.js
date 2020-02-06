$('.accordion__panel img').each((ind, el) => {
    $(el).fancybox({
        src: el.src
    })
})