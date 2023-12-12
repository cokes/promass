import DataTable from 'react-data-table-component';
import 'styled-components';
import { useState, useEffect } from 'react';
import {useForm} from "react-hook-form";




export const GetEntradasSearch = () => {

    const { register, handleSubmit, formState:{
        errors
    } } = useForm()

    const [firstRender, setFirstRender] = useState( false);

    const [entradasSearch, setEntradasSearch] = useState( [ ]);

    const URL = import.meta.env.VITE_URL;//'http://127.0.0.1/promass/api/promass-api/public/api/search';

    const onSubmit = async data => {
        //data.preventDefault()
        try {
            let config = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }

            let res = await fetch( URL, config)
            let json = await res.json()

            setEntradasSearch(json.data);
        } catch (error) {

        }
    }



    useEffect( () => {
        if (!firstRender){
           onSubmit()
            setFirstRender(true);
        }

    }, [] )

    useEffect( () => {

    }, [entradasSearch])

    const columns = [

        {
            name: 'ID',
            selector: row => row.id
        },
        {
            name: 'TITULO',
            selector: row => row.titulo
        },
        {
            name: 'AUTOR',
            selector: row => row.autor
        },
        {
            name: 'fecha',
            selector: row => row.fecha
        },
        {
            name: 'contenido',
            selector: row => row.contenido
        }

    ]

    return (
        <>
            <h1>Entradas  </h1>
            <form onSubmit={handleSubmit(onSubmit)}>
                
                <input
                    type="text"
                    placeholder=""
                    { ... register("word"
                    )}
                />

                <button type="submit">Buscar</button>
            </form>

            <DataTable
                columns={columns}
                data={entradasSearch}
                pagination
            />
        </>

    )
}
