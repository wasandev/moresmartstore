module.exports = {
    theme: {
        extend: {

            fontFamily: {
                'sans': ['Nunito'],
              },

        },
        maxWidth: (theme, { breakpoints }) => ({
            none: 'none',
            xs: '20rem',
            sm: '24rem',
            md: '28rem',
            lg: '32rem',
            xl: '36rem',
            '2xl': '42rem',
            '3xl': '48rem',
            '4xl': '56rem',
            '5xl': '64rem',
            '6xl': '72rem',
            full: '100%',
            ...breakpoints(theme('screens')),
          }),

    },
    variants: {
        borderColors: ["responsive", "hover", "focus", "group-hover"],
        visibility: ["responsive", "group-hover"],
    },
    corePlugins: {
        container: true,
    },
    plugins: [
        require('tailwindcss-plugins/pagination')
    ],
  }
