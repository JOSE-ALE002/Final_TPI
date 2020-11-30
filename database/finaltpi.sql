-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2020 a las 21:11:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finaltpi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `idAlquiler` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `idCalidad` int(11) NOT NULL,
  `calidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`idCalidad`, `calidad`) VALUES
(1, '144p'),
(2, '240p'),
(3, '360p'),
(4, '480p'),
(5, '720p'),
(6, '1080p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Acción'),
(2, 'Infantil'),
(3, 'Comedia'),
(4, 'Terror'),
(5, 'Ciencia Ficción'),
(6, 'Aventura'),
(7, 'Suspenso'),
(8, 'Romance'),
(9, 'Fantasía'),
(10, 'Drama'),
(11, 'Animación'),
(12, 'Crimen'),
(13, 'Misterio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `idUsuario`, `idPelicula`, `fechaCompra`) VALUES
(1, 2, 3, '2020-11-28'),
(2, 2, 2, '2020-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPelicula` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idioma` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `idCalidad` int(11) NOT NULL,
  `precioCompra` decimal(3,2) NOT NULL,
  `precioAlquiler` decimal(3,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPelicula`, `nombre`, `descripcion`, `idCategoria`, `idioma`, `idCalidad`, `precioCompra`, `precioAlquiler`, `stock`, `imagen`, `disponibilidad`) VALUES
(1, 'Bob Esponja: Al rescate', '                                                Antes de los eventos de la serie de televisión, Bob Esponja sale en un viaje al Kamp Koral y hace nuevos amigos. Sin embargo, cuando su caracol mascota Gary es secuestrado por Poseidón y llevado a la Ciudad Perdida de Atlantic City.                                    ', 2, 'Español', 6, '9.99', '1.99', 50, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/bob-esponja-al-rescate.jpg', 1),
(2, 'Avengers: Endgame', '                Después de la devastadora lucha contra Thanos, el universo queda en ruinas. Con la ayuda de los aliados restantes, los Vengadores se juntan una vez más para intentar revertir las acciones de Thanos y restaurar el balance al universo.\r\nUniverso Marvel                                   ', 5, 'Ingles', 6, '9.99', '9.99', 499, 'https://www.cinecalidad.is/wp-content/uploads/2019/07/avengers-endgame-4k.jpg', 1),
(3, 'Joker', '                                                En Ciudad Gótica, Arthur Fleck es un comediante con problemas mentales que es maltratado por la sociedad. Entonces cae en una espiral descendiente de revolución y crimen que lo lleva cara a cara con su alter ego: el Guasón.                                    ', 13, 'Frances', 5, '9.99', '9.99', 119, 'https://www.cinecalidad.is/wp-content/uploads/2019/12/joker-4k.jpg', 1),
(4, 'Manos a las armas', '            Miles lleva una vida tranquila y común hasta que se ve forzado por una pandilla a participar en una letal competición dentro de su ciudad para salvar a su ex novia. Miles siempre tuvo mucho ingenio para evitar sus problemas, pero ahora debe enfrentar sus miedos y luchar por la mujer que ama.', 1, 'Español', 6, '9.99', '5.00', 300, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/manos-a-las-armas.jpg', 1),
(5, 'Heartland', '                            Una familia de Alberta se esfuerza por mantener su rancho en funcionamiento y Amy Fleming descubre poco a poco que ella tiene el mismo talento que su madre fallecida de auxiliar caballos malheridos.            ', 10, 'Español', 6, '9.99', '7.00', 800, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQv8JmAMGQEO6EMsTucqaJCdlXUWLsviPn23kQGNhniHm-Ktve8', 1),
(6, 'Anne with an E', '                                            En la década de 1890, una niña huérfana de 13 años es enviada por error a vivir con hermanos mayores a la Isla del Príncipe Eduardo.                        ', 10, 'Español', 6, '9.99', '5.00', 400, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRAVNcscsbcBSc0ELIp0KR231BH4lQG4So2aAmBxjY_rkW_Agkp', 1),
(7, 'The Protector', '            Un joven habitante de la moderna Estambul descubre sus lazos con una antigua orden secreta y se dispone a salvar a su ciudad de un enemigo inmortal.', 1, 'Español', 6, '9.99', '5.00', 200, 'https://es.web.img3.acsta.net/pictures/18/11/19/18/23/0203220.jpg', 1),
(8, 'House of Cards', '                            Frank ya no está, y Claire Underwood pisa fuerte como la primera mujer presidenta de Estados Unidos. Aunque a algunos no les guste            ', 12, 'Español', 6, '9.99', '7.00', 400, 'https://es.web.img2.acsta.net/pictures/18/08/07/20/13/3117856.jpg', 1),
(9, 'Velvet', '                            La historia de amor entre una humilde costurera y un joven destinado a heredar el majestuoso imperio de la moda gobernado por su padre. Ambos están decididos a vivir su amor y quebrar las normas de la época, pero no será nada fácil para ellos.            ', 8, 'Español', 6, '9.99', '8.00', 300, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQuu4pY7zIsJZL1Fu2H27OQcu6jx4xatgkeuW0bBCCrw4ZN-Sp8', 1),
(10, '  Pretty Little Liars', '            Tras la desaparición de su líder, un grupo de antiguas amigas de la preparatoria comienzan a recibir mensajes en los que las amenazan con descubrir sus oscuros secretos.', 10, 'Español', 6, '9.99', '9.00', 400, 'https://assets.nflxext.com/us/boxshots/hd1080/70180057.jpg', 1),
(11, 'High Life', 'Monte y su hija Willow viven totalmente aislados a bordo de una nave espacial. Aunque no siempre estuvieron solo ellos: formaban parte de un grupo de condenados a muerte que tomaron el trato de conmutar sus sentencias por hacer parte de una misión cuyo destino era el agujero negro más próximo a la Tierra.', 5, 'Frances', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/high-life.jpg', 1),
(12, 'Jingle Jangle: Una mágica Navidad', 'En el increíble y majestuoso pueblo de Cobbleton, los inventos del legendario fabricante de juguetes Jeronicus Jangle maravillan a todos. Pero cuando su confiable aprendiz se lleva su más adorada creación, queda en manos de su igualmente prodigiosa nieta sanar viejar heridas y reavivar la magia.\r\n\r\n ', 6, 'Frances', 3, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/jingle-jangle-a-christmas-journey.jpg', 1),
(13, 'El carnicero', 'Un granjero se gana la vida deshaciéndose de cuerpos. Un día, tres cuerpos son entregados - excepto que la joven mujer todavía está con vida. Si es dejada en libertad, la pandilla vendrá por él y su hija.', 4, 'Ingles', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/ill-take-your-dead.jpg', 1),
(14, 'Bill & Ted salvando el universo', 'Una vez que recibieron la noticia de que salvarían el universo durante una aventura a través del tiempo, dos aspirantes a rockeros de California se encuentran como padres de edad media todavía intentando crear una canción exitosa y alcanzar su destino.', 6, 'Español', 6, '9.99', '9.99', 150, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/bill-y-ted-salvando-el-universo.jpg', 1),
(15, 'Como perros y gatos 3: ¡Patas unidas!', 'Gwen la gata y Roger el perro son agentes secretos que secretamente protegen y salvan al mundo sin que los humanos se enteren. Su sociedad se debe a la Gran Tregua, que ha evitado la hostilidad entre perros y gatos por una década. Pero la larga paz se ve amenazada cuando un loro supervillano descubre cómo manipular las frecuencias que solo los perros y gatos pueden oír.', 2, 'Español', 5, '9.99', '9.99', 120, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/cats-and-dogs-3-paws-unite.jpg', 1),
(16, 'El cadáver', 'Luego de que ocurre un desastre nuclear, una familia hambrienta encuentra un rayo de esperanza en un carismático dueño de hotel. Son invitados a una una cena en el hotel, donde descubren que no es lo que aparenta, y las cosas dan un giro siniestro, cuando la gente comienza a desaparecer.', 4, 'Ingles', 6, '9.99', '9.99', 130, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/kadaver.jpg', 1),
(17, 'Pacto de Fuga', 'El 29 de enero de 1990, poco antes de la reconstrucción democrática chilena, 49 presos políticos se fugaron de la cárcel pública de Santiago a través de un túnel excavado durante 18 meses con herramientas rudimentarias. Basada en eventos reales.', 7, 'Ingles', 6, '9.99', '9.99', 150, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/pacto-de-fuga.jpg', 1),
(18, 'Artemis Fowl: El mundo subterráneo ', 'Artemis Fowl es un niño prodigio de 12 años y descendiente de un largo linaje de mentes criminales. Pronto se encuentra a sí mismo en una épica batalla en contra de una raza de poderosas hadas subterráneas, que podrían estar detrás de la desaparición de su padre.', 9, 'Ingles', 5, '9.99', '9.99', 160, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/artemis-fowl-el-mundo-subterraneo.jpg', 1),
(19, 'El jardín secreto', 'Mary Lennox es una niña de 10 años, hija de padres ricos, que creció en la India. Después de que su familia fallece por cólera, es enviada a vivir en Yorkshire con su tío Archibald Craven. Ahí descubre un jardín secreto mágico, en la propiedad de su tío.', 2, 'Frances', 6, '9.99', '9.99', 130, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/the-secret-garden.jpg', 1),
(20, 'La princesa encantada: Una boda real ', 'La princesa Odette y el príncipe Derek asistirán a la boda donde la princesa Mei y su amado Chen. Pero fuerzas malévolas están en contra y los planes de la boda se ven empañados, dificultando las condiciones para el amor verdadero.', 2, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/the-swan-princess-a-royal-wedding.jpg', 1),
(21, 'Star Wars: El ascenso de Skywalker', 'Los miembros sobrevivientes de la resistencia se enfrentan a la Primera Orden una vez más, y el legendario conflicto entre los Jedi y los Sith alcanza su punto máximo llevando la saga Skywalker a su fin.\r\nSaga Star Wars', 1, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/03/star-wars-the-rise-of-skywalker-4k.jpg', 1),
(22, 'Doctor Sueño ', 'Años después de los eventos de El Resplandor, el ahora adulto Dan Torrance debe proteger a una niña con poderes similares de un culto conocido como The True Knot, quienes cazan niños con poderes para permanecer inmortales.', 4, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/01/doctor-sleep-4k.jpg', 1),
(23, 'Maléfica: Dueña del mal', 'Maléfica y su ahijada Aurora empiezan a cuestionar los complejos lazos familiares que las unen cuando son impulsadas en diferentes direcciones por una boda inminente, aliados inesperados y nuevas fuerzas oscuras en acción.', 9, 'Inglés', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/01/malefica-duena-del-mal-4k.jpg', 1),
(24, 'Nadie duerme en el bosque esta noche', 'Un grupo de adolescentes tecno-dependientes se van a un campamento offline. Pero una simple actividad como senderismo sin acceso a sus celulares no terminará como es planeado por los organizadores. Tendrán que pelear por su vida real con algo que no han visto ni en los rincones más ocultos de Internet. Enfrentando a un peligro letal en el bosque, descubrirán qué significa la verdadera amistad.\r\n\r\n ', 4, 'Ingles', 6, '9.99', '9.99', 150, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/nobody-sleeps-in-the-woods.jpg', 1),
(25, 'The Rental', 'Dos parejas en una propiedad al lado del océano comienzan a sospechar que el anfitrión de su aparentemente perfecta casa rentada podría estar espiándolos. Pronto, lo que debería haber sido un fin de semana de celebración se convierte en algo más siniestro, conforme secretos bien guardados son expuestos y los cuatro viejos amigos vienen a verse bajo una nueva luz.', 7, 'Español', 6, '9.99', '9.99', 150, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/the-rental.jpg', 1),
(26, 'El diablo a todas horas', 'En Knockemstiff, Ohio, personajes siniestros convergen alrededor de Arvin Russell, un joven dedicado a protegerse a sí mismo y a a sus seres queridos en un pueblo de post guerra que está lleno de corrupción y brutalidad.', 7, 'Frances', 5, '9.99', '9.99', 120, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/el-diablo-a-todas-horas.jpg', 1),
(27, 'Rebecca', 'Una joven recién casada llega a la imponente propiedad de su nuevo marido, ubicada en la costa inglesa. Y pronto se encuentra batallando con la sombra de su primera esposa, Rebecca, cuyo legado vive en la casa por mucho tiempo después de su muerte.', 8, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/rebecca.jpg', 1),
(28, 'Ahí te encargo', 'Alex, un creativo de publicidad quiere ser un padre a cualquier costo, pero su esposa es una abogada que está muy concentrada en su carrera, y ser una madre no forma parte de sus planes. Entonces un huésped inesperado pondrá a prueba su amor.', 8, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/ahi-te-encargo.jpg', 1),
(29, 'Borat Subsequent Moviefilm', 'Catorce años después de hacer una película que trata sobre su viaje a través de los Estados Unidos, el periodista kazajo de televisión Borat pone su vida en riesgo al retornar con su joven hija, con lo cual revela más sobre la cultura, la pandemia del COVID-19 y las elecciones políticas.', 3, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/borat-subsequent-moviefilm.jpg', 1),
(30, '¡Feliz Halloween, Scooby Doo!', 'El feriado favorito de Scooby Doo y Shaggy llega! Con monstruos falsos y dulces - Halloween es el paraíso para estos golosos que van puerta a puerta. Pero, este año, su dulce festividad se agria cuando las calabazas del vecindario son infectadas, creando jack-o-lanterns por todas partes y un líder calabaza... destrozando todo a su paso.', 3, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/happy-halloween-scooby-doo.jpg', 1),
(31, 'Superman: Hombre del Mañana', 'El pasante del Daily Planet, Clark Kent, trabaja junto a la reportera Lois Lane, mientras secretamente utiliza sus poderes alienígenas de vuelo, superfuerza y visión de rayos X. Pero se avecinan mayores problemas cuando Lobo y Parasite tienen su mirada puesta en Metropolis.\r\n\r\n ', 11, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/superman-man-of-tomorrow-4k.jpg', 1),
(32, 'Mascotas unidas', 'Un grupo de mascotas consentidas y egoístas lideradas por la glamorosa gata Belle quedan atrapadas en su lujoso lugar \"Mascotas Mimadas\" cuando las máquinas que mantienen Robo City, la hipermoderna metrópolis en la que viven, enloquecen y asumen el control. Ahora Roger, un perro callejero, y Belle, se embarcan en una aventura llena de acción.\r\n\r\n ', 11, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/pets-united.jpg', 1),
(33, 'Fearless', 'Reid, cuyo nombre de usuario es \"Fe@rLeSS_\", es un jugador adolescente que es un experto en juegos de acción de súper héroes. Pero pronto se ve forzado a subir de nivel a niñera de tiempo copmleto cuando su videojuego favorito deja tres infantes con súper poderes en su patio trasero.', 11, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/fearless.jpg', 1),
(34, 'Liga de la Justicia Oscura: Guerra de Apokolips', 'Después de la aniquilación de la Tierra en manos de Darkseid, los super héroes restantes se ven forzados a reagruparse y llevar la guerra hasta el mismo Darkseid si tienen alguna oportunidad de salvar al planeta y a los sobrevivientes de una vez por todas.\r\nLiga de la justicia oscura (2017)', 11, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/05/justice-league-dark-apokolips-war-4k.jpg', 1),
(35, 'La caja negra', 'Un padre soltero está luchando por recuperar su memoria después de sobrevivir un trágico accidente de auto. Desesperado para regresar a su yo anterior mientras intenta criar a su hija, recibe un tratamiento experimental que lo ayuda a sondear su pasado, el cual repentinamente se siente demasiado oscuro como para ser el suyo.', 5, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/black-box.jpg', 1),
(36, 'Alerta en lo profundo 3', 'Estudiando los efectos del cambio climático en la costa de Mozambique, una bióloga marina y su equipo se enfrentan a tres tiburones toro genéticamente mejorados. Ahora, un nuevo baño de sangre espera en nombre de la ciencia.\r\n\r\n ', 5, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/deep-blue-sea-3.jpg', 1),
(37, 'Sonic: La película', 'Después de descubrir a un increíblemente veloz erizo azul, un oficial de policía de un pequeño pueblo debe ayudarlo a derrotar a un genio malvado que quiere capturarlo para experimentar con él. Basada en el videojuego.', 6, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/04/sonic-the-hedgehog-4k.jpg', 1),
(38, 'Bad Boys para siempre', 'Marcus y Mike deben confrontar cambios de carrera y crisis de edad media, cuando se unen a un equipo de élite recién creado del departamento de policía de Miami para capturar al implacable Armando Armas, líder de un cartel de drogas.\r\nTrilogía Bad Boys\r\n\r\n ', 1, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/04/bad-boys-for-life-4k.jpg', 1),
(39, 'Mulán', 'Cuando el emperador de China lanza un decreto de que un hombre por familia debe servir al Ejército Imperial para defender al país de los Hunos, Hua Mulán, la hija mayor de un honorable guerrero, toma el lugar de su padre. Ella es determinada y enfrenta pruebas a cada momento, y debe usar su fuerza interior para alcanzar su verdadero potencial.', 1, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/mulan-4k.jpg', 1),
(40, 'El hombre invisible ', 'Cuando el ex de Cecilia se quita la vida y le deja su fortuna, ella sospecha que su muerte fue un engaño. Conforme una serie de coincidencias se vuelven letales, Cecilia hace todo lo posible para probar que está siendo acechada por alguien que nadie puede ver.', 4, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/04/the-invisible-man-4k.jpg', 1),
(41, 'El juicio de los 7 de Chicago', 'Lo que pretendía ser una protesta pacífica en la Convención Nacional Democrática de 1968 se convirtió en un violento enfrentamiento con la policía y la Guardia Nacional. Los organizadores de la protesta fueron acusados de conspiración para incitar un motín. El juicio que siguió fue uno de los más notorios de la historia.', 7, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/el-juicio-de-los-7-de-chicago.jpg', 1),
(42, 'Mal de ojo', 'Un romance aparentemente perfecto se convierte en algo sombrío cuando una madre se convence de que el nuevo novio de su hija tiene una siniestra conexión con su propio pasado. Ella está convencida que él es la reencarnación de un hombre que intentó matarla hace 30 años.\r\n\r\n ', 7, 'Inglés', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/evil-eye.jpg', 1),
(43, 'Amor de calendario', 'Cansados de estar solteros durante las festividades, dos desconocidos llegan a un acuerdo de ser sus acompañantes platónicos durante todo un año, solo para llegar a sentir sentimientos reales en el proceso.', 8, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/holidate.jpg', 1),
(44, 'Amor garantizado', 'La abogada Susan ha tomado demasiados casos pro bono. Ahora para salvar su pequeña firma de abogados, a regañadientes acepta un caso de alto pago y alto perfil de Nick, un encantador nuevo cliente que quiere demandar a un sitio de citas que garantiza encontrar el amor. Pero Susan y Nick pronto se encuentran en una tormenta mediática, y comforme el caso se enciende, también sus sentimientos entre ellos - lo que podría poner todo en peligro.', 8, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/love-guaranteed.jpg', 1),
(45, 'Nueva York sin salida', 'Durante la búsqueda de un dúo de asesinos de policías, el detective Andre Davis comienza a descubrir una masiva e inesperada conspiración y debe decidir a quién persigue y quién lo está persiguiendo a él.', 12, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/03/nueva-york-sin-salida-4k.jpg', 1),
(46, 'Crímenes de familia', 'Alicia se embarca en el viaje de su vida. Su hijo, Daniel, es acusado de la violación e intento de homicidio de su ex esposa. Confundida y desesperada, ella hará todo lo que pueda para evitar que su hijo vaya a prisión, transformándose todo en una pesadilla.', 12, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/crimenes-de-familia.jpg', 1),
(47, 'Enola Holmes', 'Inglaterra, 1884. En la mañana de su cumpleaños número 16, Enola Holmes encuentra que su madre ha desaparecido, dejando atrás una serie de extraños regalos pero sin ninguna pista aparente de dónde se fue o por qué. Así que Enola ahora está bajo el cuidado de sus hermanos Sherlock y Mycroft. Rechazando seguir sus deseos, Enola escapa para buscar a su madre en Londres.', 6, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/enola-holmes.jpg', 1),
(48, 'Amor de gata', 'Miyo Sasaki se enamora de su compañero Kento Hinode. Ella intenta hacerse notar cada día, pero en vano. Entonces descubre una máscara mágica que le permite transformarse en una gata, con lo cual intenta llamar su atención, pero también existe la posibilidad de que nunca vuelva a ser humana si sigue usando la máscara.', 6, 'Inglés', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/a-whisker-away.jpg', 1),
(49, 'Clouds', 'Zach Sobiech, de 17 años, es un divertido estudiante con talento musical nato. Pero pocas semanas después de iniciar su último año, su mundo se viene abajo cuando descubre que su cáncer se extendió, dejándolo con apenas unos meses de vida. Con el limitado tiempo que le queda, él y su mejor amiga y compañera escritora, Sammy, deciden seguir sus sueños y finalmente lanzar un album.', 10, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/clouds.jpg', 1),
(50, 'Música, glamour y fama', 'Grace Davis, una superestrella cuyo talento, y ego, han alcanzado niveles increíbles. Maggie es la atareada asistente personal de Grace, pero que aún aspira a su sueño de infancia de convertirse en una productora. Cuando el manager de Grace le presenta una oportunidad que podría cambiar el curso de su carrera, Maggie y Grace idean un plan que podría cambiar sus vidas.', 10, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/musica-glamour-y-fama.jpg', 1),
(51, 'Araña', 'Tres amigos son parte de un grupo de oposición en el caótico Chile de principios de los 70, y juntos cometen un crimen político que cambia la historia del país e incidentalmente los involucra en una traición que los separa para siempre.', 12, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/arana.jpg', 1),
(52, 'En la ruta del narco', 'Un gran cargamento de cocaína contrabandaeada desde México hacia Canadá a través de Estados Unidos se pierde misteriosamente en el camino. El jefe del cartel de drogas instruye a sus dos asistentes, Cook y Man, a averiguar dónde y exactamente qué salió mal. Entonces deben revisar toda la cadena internacional de tráfico de drogas, cruzando fronteras mientras intentan eludir a los federales.', 12, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/08/running-with-the-devil.jpg', 1),
(53, 'Bloodshot', 'Ray Garrison, un soldado de élite que murió en combate, es resucitado gracias a una avanzada tecnología que también le da la habilidad de fuerza sobrehumana y rápida recuperación. Basada en el comic.', 5, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/03/bloodshot-4k.jpg', 1),
(54, 'Ben 10 Versus el Universo: La Película', 'Uno de los villanos más temibles de la galaxia tiene la intención de acabar con la humanidad. Así que Ben 10 tendrá que viajar al espacio exterior, donde se verá en la necesidad de luchar contra él, convirtiéndose en la batalla más importante y grande de su vida.', 11, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/ben-10-versus-the-universe.jpg', 1),
(55, 'Nocturno', 'Las hermanas gemelas Juliet y Vivian adoran tocar el piano. Para cuando es tiempo de graduarse de colegio, los logros de Vivian han eclipsado cualquier esperanza o aspiraciones que Juliet pudiera tener. Así que ella hace un trato con el diablo para superar a su hermana en una prestigiosa institución de música clásica.', 13, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/nocturne.jpg', 1),
(56, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/nocturne.jpg', 'Cuando una parada de tránsito de rutina resulta en la inexplicable y espeluznante muerte de su colega, una policía se da cuenta que las imágenes del incidente solo reproducirán frente a sus ojos. Mientras los ataques aumentan, ella debe acelerar el paso para descubrir la fuerza sobrenatural por detrás de ellos.\r\n\r\n ', 13, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/body-cam.jpg', 1),
(57, 'Mentiras peligrosas', 'Cuando un anciano millonario muere e inesperadamente le deja toda su herencia a su nueva enfermera, ella se ve envuelta en una red de engaños y muerte. Si quiere sobrevivir, tendrá que dudar de los motivos de todos, incluso de las personas que ama.', 13, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/05/dangerous-lies.jpg', 1),
(58, 'La Herencia', 'El patriarca de una acaudalada y poderosa familia con vínculos políticos repentinamente fallece, dejando atrás a su hija con responsabilidades y una sorpresiva herencia secreta que amenaza con destruir a la familia.', 13, 'Inglés', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/09/inheritance.jpg', 1),
(59, 'El Halloween de Hubie', 'El excéntrico voluntario de la comunidad Hubie Dubois se encuentra en el centro de un caso real de asesinato en la noche de Halloween. A pesar de su devoción por su ciudad natal de Salem y sus legendarias celebraciones de Halloween, Hubie es una figura de burla tanto para niños como adultos.', 3, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/10/hubie-halloween.jpg', 1),
(60, 'Guía de una niñera para cazar monstruos', 'Reclutada por una sociedad secreta de niñeras, una joven de secundaria se embarca en una misión para luchar contra el coco y sus monstruos cuando se llevan al niño que está cuidando durante Halloween.\r\n\r\n ', 9, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/a-babysitters-guide-to-monster-hunting.jpg', 1),
(61, 'Aladdín', 'Un joven callejero de noble corazón anhela el amor de la hermosa princesa Jasmine. Cuando consigue una lámpara mágica, usa los poderes del genio para convertirse en un príncipe.', 9, 'Español', 5, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2019/08/aladdin-4k.jpg', 1),
(62, 'Dumbo', 'Un joven elefante cuyas enormes orejas le permiten volar, ayuda a salvar a un circo en problemas. Pero cuando el circo planea nuevos proyectos, Dumbo y sus amigos descubren oscuros secretos detrás de bambalinas.', 9, 'Inglés', 5, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2019/06/dumbo-4k.jpg', 1),
(63, 'Come to Daddy', 'La vida de Norval ha sido difícil. Actualmente viviendo con su madre, el agobiado joven está saliendo de problemas con el alcohol. Así que cuando recibe una carta inesperada de su padre alejado, Norval toma un autobús hasta el hogar recluído y escénico de su padre a orillas del mar. Tal vez reconectar con su padre le dará la alegría emocional que le falta. Pero rápidamente, él nota que algo no está bien con su padre.', 3, 'Español', 6, '9.99', '9.99', 123, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/mas-alla-de-la-luna.jpg', 1),
(64, 'Las brujas', 'En 1967, un niño huérfano se va a vivir con su amorosa abuela en el pueblo de Demopolis. Cuando ambos encuentran a unas glamorosas pero diabólicas brujas, ella lo lleva lejos a un resort en la playa. Lamentablemente, llegan al mismo tiempo en el que La Gran Bruja se ha reunido con sus colegas de alrededor del mundo.', 3, 'Inglés', 6, '9.99', '9.99', 140, 'https://www.cinecalidad.is/wp-content/uploads/2020/11/the-witches.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL DEFAULT 2,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `email`, `direccion`, `idRol`, `pass`) VALUES
(1, 'Alejandro', 'Ibañez', 'Ale@gmail.com', 'Pacifica', 1, '$2y$10$SB97k5Wn81slpKF9ASmoi.EW6e4erNFBLBf3nav3hdsvk3MGWSaOC'),
(2, 'Gerson', 'Diaz', 'Gerson@gmail.com', 'Pacifica', 2, '$2y$10$x0kpQ4wzD/7IfivLadJxtedGVKJHTlkpRX9PqvR9913Ps4AiVX0p6'),
(3, 'Douglas', 'Cañas', 'Douglas@gmail.com', 'Pacifica', 2, '$2y$10$8vGFV0oSGzRBJpSLMmTzsuZU955voQOpfeG94AC2wXahHWFjxbhK.'),
(4, 'Benjamin', 'Bernal', 'Benja@gmail.com', 'Berlin', 1, '$2y$10$cHWTEbiaxKmk/yHggGv3peH2CwmWSDoE53.MBBjbxSAWsg.Cexb46'),
(5, 'Adolfo', 'Guzman', 'Adolfo@gmail.com', 'Berlin', 2, '$2y$10$FoJ2AOYmD3NZcxxfhOj45OgYploxzjIBSt59zZJsfKbboFziJZSn.'),
(6, 'Pavel', 'Coreas', 'Pavel@gmail.com', 'Pacifica', 2, '$2y$10$vjz8ZO/PVjWq848ogCjSX.O0ifB0kkJDpJHUWNpLYblTjA6oTOrx6'),
(7, 'Marlon', 'Coreas', 'Marlon@gmail.com', 'Estanzuela', 1, '$2y$10$xBKhiexUaCkU/z9OaQIC8e6Hy.aX6/Pzf.wbin4UZPwEIx5/JMk9a'),
(8, 'Alfonso', 'Lemus', 'Lemus@gmail.com', 'Jucuapa', 1, '$2y$10$VdtssLPxsJ4c6OKgpnJhguTq184Lqt.PgjWU0BOOwtJOgAzGZxxXS'),
(9, 'Carlos', 'Ivan', 'Ivan@gmail.com', 'San Miguel', 1, '$2y$10$LsEAqE/9eRijy61xKaKBC.cRijY7Ysep14sILWy7wCGJVQj/roA96'),
(11, 'Jose', 'Cuevas', 'Jose@gmail.com', 'Presita', 2, '$2y$10$LiJ7IC.OIN7BnPGiTdTFweEzmhg3OJIuZR6XrFOAEv8KoJML/pMg6'),
(12, 'Kenia', 'Calderon', 'Keny@gmail.com', 'Santa rosa', 2, '$2y$10$ACXNU/Iztx.uF8UsDT0cg.BCLiaFsk.Y0bjX4pXwkcR3CFjc9A9qC'),
(13, 'Kevin', 'Pineda', 'Pineda@gmail.com', 'Estados unidos', 2, '$2y$10$PNY0v9gpz6nINZseqYxvtOh1IMyRzqjl/jkd7ewdMkMB8nGNaARIa'),
(14, 'Stanley', 'Sanchez', 'Stanley@gmail.com', 'Pacifica', 2, '$2y$10$x4BCOyUMjLfDOCNixhKzQ.Z7HJDYkuVXVk5CEy6wQykFh6zI/qM7S'),
(15, 'Aldair', 'MArin', 'Aldair@gmail.com', 'Presita', 2, '$2y$10$KPsxcnTG7SprhZlkAHIdzeXbKRcYzm5.1o1YHk1ARfPSre8IPbWuq'),
(16, 'Elias', 'Salazar', 'e@gmail.com', 'San Miguel', 2, '$2y$10$M9gE6SgzALyYrRvSxs0wietR3k.4R/S1hY96FKyK9FpvMW4ltF0sC'),
(26, 'Maria', 'Figueroa', 'm@gmai.com', 'San Salvador', 2, '$2y$10$5j8TGLXXWnd/cmFwEfUM4.SAH2Vdf0uqG1.raUn8Bkb1ep.N8Mvki'),
(27, 'Alex', 'Figueroa', 'a@gmail.com', 'San Miguel', 2, '$2y$10$joaAqIYMLcdYGl/HUOGvJO2mlalFFHitcz3zUHoO1LuCrm4sx5xHW'),
(28, 'Daniela', 'Martinez', 'd@gmail.com', 'San Salvador', 2, '$2y$10$DkNQXwMXDJBzp67VQGPiIO2QvbQ0NDOEget9.lRwCMDACL0.YDCwy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `idValoracion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `valoracion` tinyint(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`idValoracion`, `idUsuario`, `idPelicula`, `valoracion`, `fecha`) VALUES
(40, 2, 3, 1, '2020-11-03'),
(58, 16, 1, 1, '2020-11-03'),
(59, 16, 2, 1, '2020-11-03'),
(60, 16, 3, 1, '2020-11-03'),
(61, 28, 3, 1, '2020-11-03'),
(62, 27, 3, 1, '2020-11-03'),
(67, 16, 10, 1, '2020-11-03'),
(69, 27, 10, 1, '2020-11-03'),
(76, 2, 4, 1, '2020-11-03'),
(77, 2, 2, 1, '2020-11-03'),
(78, 2, 1, 1, '2020-11-03'),
(79, 2, 9, 1, '2020-11-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`idAlquiler`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`idCalidad`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `idCalidad` (`idCalidad`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`idValoracion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `idAlquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `idCalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `idValoracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`idCalidad`) REFERENCES `calidad` (`idCalidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
