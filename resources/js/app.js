import "./bootstrap";
import "flowbite";
import { initFlowbite } from 'flowbite'
import { Modal } from 'flowbite';
import 'iconify-icon';

import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
import Link from '@tiptap/extension-link'
import TextAlign from '@tiptap/extension-text-align'
import { Indent } from './indent.js'

window.setupEditor = function (content) {
    let editor
    let activeAlign = '';

    const checkAlignActive = (align) => {
        if(align !== activeAlign) {
            activeAlign = align;
            return editor.commands.setTextAlign(align);
        } else {
            activeAlign = ''
            return editor.commands.unsetTextAlign()
        }
    }

    return {
        content: content,

        init(element) {
            editor = new Editor({
                element: element,
                extensions: [
                    StarterKit.configure({
                        orderedList: {
                            HTMLAttributes: {
                                class: 'order-list',
                            },
                        },
                        bulletList: {
                            HTMLAttributes: {
                                class: 'bullet-list',
                            },
                        },
                        heading: {
                            HTMLAttributes: {
                                class: 'text-xl font-bold'
                            }
                        }
                    }),
                    Underline,
                    Link.configure({
                        protocols: ['http', 'https'],
                        HTMLAttributes: {
                            class: 'link-active',
                        },
                        validate: href => /^https?:\/\//.test(href),
                    }),
                    Indent,
                    TextAlign.configure({
                        types: ['heading', 'paragraph'],
                    }),
                ],
                content: this.content,
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML()
                }
            })

            this.$watch('content', (content) => {
                // If the new content matches TipTap's then we just skip.
                if (content === editor.getHTML()) return

                editor.commands.setContent(content, false)
            })
        },
        toggleBold() {
            editor.commands.toggleBold()
        },
        toggleItalic() {
            editor.commands.toggleItalic()
        },
        toggleUnderline() {
            editor.commands.toggleUnderline()
        },
        toggleStrike() {
            editor.commands.toggleStrike()
        },
        toggleHeading() {
            editor.commands.toggleHeading({ level: 1 })
        },
        toggleLink() {
            const url = window.prompt("Masukkan URL")
            if(url)
                editor.commands.toggleLink({ href: url, target: '_blank' })
            else
                window.alert("Tidak dapat menautkan URL")
        },
        toggleOrderedList() {
            editor.commands.toggleOrderedList()
        },
        toggleBulletList() {
            editor.commands.toggleBulletList()
        },
        indentLine() {
            editor.commands.indent()
        },
        outdentLine() {
            editor.commands.outdent()
        },
        textAlignRight() {
            checkAlignActive('right')
        },
        textAlignLeft() {
            checkAlignActive('left')
        },
        textAlignCenter() {
            checkAlignActive('center')
        },
        textAlignJustify() {
            checkAlignActive('justify')
        },
    }
}


// initialize components based on data attribute selectors
initFlowbite();


