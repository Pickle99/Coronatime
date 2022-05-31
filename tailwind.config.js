module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        width: {
          '500' : '500px',
        },
        spacing: {
          '100' : '22rem',
        },
        screens:{
          'mob': '380px',
        },
        opacity: {
          '0.08': '0.08',
        },
        boxShadow: {
          'custombox': "1px 2px 8px rgba(0, 0, 0, 0.04);"
        },
        colors: {
            'greener' : '#0FBA68',
            'newcases': '#2029F3',
            'yellowb' : '#EAD621',
        },
        fontFamily: {
            'inter': "'Inter', sans-serif",
        },
    },
  },
  plugins: [],


}

