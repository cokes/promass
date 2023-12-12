import { useForm } from 'react-hook-form'

export const AddEntrada = () => {

    const { register, handleSubmit, reset,formState:{
        errors
    } } = useForm({
    })

    const URL_ADD_ENTRADAS = import.meta.env.VITE_URL_ENTRADAS;

    const onSubmit = async data => {

        try {
            let config = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }

            let res = await fetch(URL_ADD_ENTRADAS, config)
            let json = await res.json()

            if (json.status === 200){
                alert("guardado correctamente");
                reset();
            }
        } catch (error) {

        }
    }

    return (
        <>
            <form onSubmit={handleSubmit(onSubmit)} className='form'>
                <div className='titulo'>
                    <label
                    htmlFor="titulo"
                    > Titulo </label>
                    <input
                        type="text"
                        placeholder="titulo"
                        { ... register("titulo",{
                                required: true
                        })}
                    />
                    {
                        errors.titulo && <span>Campo requerido</span>
                    }
                </div>
                <div className='autor'>
                    <label
                        htmlFor="autor"
                    > Autor </label>
                    <input
                        type="text"
                        placeholder="autor"
                        { ... register("autor", {
                            required: true
                        })}
                    />
                    {
                        errors.autor && <span>Campo requerido</span>
                    }
                </div>
                <div className='contenido'>
                    <label
                        htmlFor="contenido"
                    > Contenido </label>
                    <input
                        type="text"
                        placeholder="contenido"
                        { ... register("contenido",{
                            required: true
                        })}
                    />
                    {
                        errors.contenido && <span>Campo requerido</span>
                    }
                </div>
                <div className='buttonCampo'>
                    <div className='leftButton'></div>
                    <button type="submit">Agregar</button>
                </div>
                
            </form>

        </>

    )
}