
import section1 from '../components/mailtemplate/section1'
import section2 from '../components/mailtemplate/section2'
import section3 from '../components/mailtemplate/section3'

export default [
    {
        id:1,
        title:'Horizontal Text and image section',
        text:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit saepe alias, labore earum ratione culpa',
        content:section1,
        mode:'initial',
        fields:[
            {
                type:'image',
            },
            {
                type:'text'
            }
        ]
    },
    {
        id:2,
        title:'Logo Banner',
        text:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit saepe alias, labore earum ratione culpa',
        content:section2,
        mode:'initial',
        fields:[
            {
                type:'image',
            }, 
        ]
    },
    {
        id:3,
        title:'Header and text',
        text:'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit saepe alias, labore earum ratione culpa',
        content:section3,
        mode:'initial',
        fields:[ 
            {
                type:'text'
            }
        ]
    }
]