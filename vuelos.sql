--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aeropuerto; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE aeropuerto (
    idaeropuerto integer NOT NULL,
    nombre character varying(255),
    idpais integer
);


ALTER TABLE public.aeropuerto OWNER TO topicos_web;

--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE aeropuerto_idaeropuerto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aeropuerto_idaeropuerto_seq OWNER TO topicos_web;

--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE aeropuerto_idaeropuerto_seq OWNED BY aeropuerto.idaeropuerto;


--
-- Name: asiento; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE asiento (
    idasiento integer NOT NULL,
    letra character varying(1) DEFAULT NULL::character varying,
    fila integer
);


ALTER TABLE public.asiento OWNER TO topicos_web;

--
-- Name: asiento_idasiento_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE asiento_idasiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asiento_idasiento_seq OWNER TO topicos_web;

--
-- Name: avion; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE avion (
    idavion integer NOT NULL,
    marca character varying(150),
    capacidad integer
);


ALTER TABLE public.avion OWNER TO topicos_web;

--
-- Name: avion_idavion_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE avion_idavion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.avion_idavion_seq OWNER TO topicos_web;

--
-- Name: avion_idavion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE avion_idavion_seq OWNED BY avion.idavion;


--
-- Name: cliente; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE cliente (
    idcliente integer NOT NULL,
    nombres character varying(100),
    apellidos character varying(150),
    direccion character varying(255),
    direccion_facturacion character varying(255),
    modo_pago character varying(25),
    nacimiento date
);


ALTER TABLE public.cliente OWNER TO topicos_web;

--
-- Name: cliente_idcliente_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE cliente_idcliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_idcliente_seq OWNER TO topicos_web;

--
-- Name: cliente_idcliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE cliente_idcliente_seq OWNED BY cliente.idcliente;


--
-- Name: disponibles; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE disponibles (
    iddisponibles integer NOT NULL,
    idorigen integer,
    iddestino integer,
    idtarifa integer,
    fechahora timestamp without time zone,
    idavion integer,
    capacidad_actual integer
);


ALTER TABLE public.disponibles OWNER TO topicos_web;

--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE disponibles_iddisponibles_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disponibles_iddisponibles_seq OWNER TO topicos_web;

--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE disponibles_iddisponibles_seq OWNED BY disponibles.iddisponibles;


--
-- Name: hospedaje; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE hospedaje (
    idhospedaje integer NOT NULL,
    idsuite integer NOT NULL,
    idhotel integer NOT NULL,
    dias integer NOT NULL,
    total double precision,
    idcliente integer NOT NULL
);


ALTER TABLE public.hospedaje OWNER TO topicos_web;

--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE hospedaje_idhospedaje_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hospedaje_idhospedaje_seq OWNER TO topicos_web;

--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE hospedaje_idhospedaje_seq OWNED BY hospedaje.idhospedaje;


--
-- Name: hotel; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE hotel (
    idhotel integer NOT NULL,
    capacidad integer,
    nombre character varying(150),
    direccion character varying(255)
);


ALTER TABLE public.hotel OWNER TO topicos_web;

--
-- Name: hotel_idhotel_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE hotel_idhotel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hotel_idhotel_seq OWNER TO topicos_web;

--
-- Name: hotel_idhotel_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE hotel_idhotel_seq OWNED BY hotel.idhotel;


--
-- Name: pago; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE pago (
    idpago integer NOT NULL,
    idcliente integer,
    monto double precision,
    cupon double precision,
    total double precision
);


ALTER TABLE public.pago OWNER TO topicos_web;

--
-- Name: pago_idpago_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE pago_idpago_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pago_idpago_seq OWNER TO topicos_web;

--
-- Name: pais; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE pais (
    idpais integer NOT NULL,
    nombre character varying(255)
);


ALTER TABLE public.pais OWNER TO topicos_web;

--
-- Name: pais_idpais_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE pais_idpais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pais_idpais_seq OWNER TO topicos_web;

--
-- Name: pais_idpais_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE pais_idpais_seq OWNED BY pais.idpais;


--
-- Name: reserva; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE reserva (
    idreserva integer NOT NULL,
    costo double precision,
    fecha date
);


ALTER TABLE public.reserva OWNER TO topicos_web;

--
-- Name: reserva_idreserva_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE reserva_idreserva_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reserva_idreserva_seq OWNER TO topicos_web;

--
-- Name: suite; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE suite (
    idsuite integer NOT NULL,
    clase character varying(100),
    precio double precision,
    numsuite integer
);


ALTER TABLE public.suite OWNER TO topicos_web;

--
-- Name: suite_idsuite_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE suite_idsuite_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.suite_idsuite_seq OWNER TO topicos_web;

--
-- Name: suite_idsuite_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE suite_idsuite_seq OWNED BY suite.idsuite;


--
-- Name: tarifa; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE tarifa (
    idtarifa integer NOT NULL,
    clase character varying(100),
    precio double precision
);


ALTER TABLE public.tarifa OWNER TO topicos_web;

--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE tarifa_idtarifa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tarifa_idtarifa_seq OWNER TO topicos_web;

--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE tarifa_idtarifa_seq OWNED BY tarifa.idtarifa;


--
-- Name: vuelo; Type: TABLE; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE TABLE vuelo (
    idvuelo integer NOT NULL,
    idcliente integer,
    cupon double precision,
    total double precision,
    iddisponibles integer
);


ALTER TABLE public.vuelo OWNER TO topicos_web;

--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE; Schema: public; Owner: topicos_web
--

CREATE SEQUENCE vuelo_idvuelo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vuelo_idvuelo_seq OWNER TO topicos_web;

--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: topicos_web
--

ALTER SEQUENCE vuelo_idvuelo_seq OWNED BY vuelo.idvuelo;


--
-- Name: idcliente; Type: DEFAULT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY cliente ALTER COLUMN idcliente SET DEFAULT nextval('cliente_idcliente_seq'::regclass);


--
-- Name: idhospedaje; Type: DEFAULT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY hospedaje ALTER COLUMN idhospedaje SET DEFAULT nextval('hospedaje_idhospedaje_seq'::regclass);


--
-- Name: idvuelo; Type: DEFAULT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY vuelo ALTER COLUMN idvuelo SET DEFAULT nextval('vuelo_idvuelo_seq'::regclass);


--
-- Data for Name: aeropuerto; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY aeropuerto (idaeropuerto, nombre, idpais) FROM stdin;
10	Puerto 1	5
15	Puerto 2	4
16	Puerto 3	3
17	Puerto 4	2
20	Puerto 5	6
\.


--
-- Name: aeropuerto_idaeropuerto_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('aeropuerto_idaeropuerto_seq', 20, true);


--
-- Data for Name: asiento; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY asiento (idasiento, letra, fila) FROM stdin;
\.


--
-- Name: asiento_idasiento_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('asiento_idasiento_seq', 1, false);


--
-- Data for Name: avion; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY avion (idavion, marca, capacidad) FROM stdin;
1	Marca 1	100
2	Marca 2	2000
3	Marca 3	300
4	Marca 4	4000
\.


--
-- Name: avion_idavion_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('avion_idavion_seq', 4, true);


--
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY cliente (idcliente, nombres, apellidos, direccion, direccion_facturacion, modo_pago, nacimiento) FROM stdin;
11	Maria	Gonzalez	ITC	ITC	Tarjeta	2011-09-01
12	Jose	Martinez	AV Noseque	AV facturation	Efectivo	2012-05-27
13	Jose	Martinez	AV Noseque	AV facturation	Efectivo	2012-05-27
14	a	a	a	a	Efectivo	2011-01-01
15	a	a	a	a	Efectivo	2011-01-01
16	a	a	a	a	Efectivo	2011-01-01
17	a	a	a	a	Efectivo	2011-01-01
18	jj	jj	jj	jj	Efectivo	2011-01-01
19	Miriam	Perez	Mm	Mm	Efectivo	2011-01-01
20	a	a	a	a	Efectivo	2011-01-01
21	pp	pp	pp	pp	Efectivo	2011-01-01
22	pablo	oo	oo	oo	Efectivo	2011-01-01
23	juan	jj	jj	jj	Efectivo	2011-01-01
24	fadsaf	adsfads	afds	afds	Efectivo	2011-01-01
25	Valeria	Santana	Mi casa :3	Mikasa :3	Efectivo	2011-01-01
\.


--
-- Name: cliente_idcliente_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('cliente_idcliente_seq', 25, true);


--
-- Data for Name: disponibles; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY disponibles (iddisponibles, idorigen, iddestino, idtarifa, fechahora, idavion, capacidad_actual) FROM stdin;
1	10	15	1	2014-08-12 00:00:00	1	\N
2	10	16	2	2014-08-13 00:00:00	1	\N
3	20	15	3	2014-09-12 00:00:00	1	\N
4	16	17	1	2014-08-12 00:00:00	1	\N
5	17	20	2	2014-09-12 00:00:00	1	\N
6	20	10	3	2014-08-13 00:00:00	1	\N
\.


--
-- Name: disponibles_iddisponibles_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('disponibles_iddisponibles_seq', 6, true);


--
-- Data for Name: hospedaje; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY hospedaje (idhospedaje, idsuite, idhotel, dias, total, idcliente) FROM stdin;
\.


--
-- Name: hospedaje_idhospedaje_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('hospedaje_idhospedaje_seq', 1, false);


--
-- Data for Name: hotel; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY hotel (idhotel, capacidad, nombre, direccion) FROM stdin;
1	20000	Hotel 1	Direccion 1
2	40000	Hotel 2	Direccion 2
3	80000	Hotel 3	Direccion 3
4	10000	Hotel 4	Direccion 4
5	50000	Hotel 5	Direccion 5
\.


--
-- Name: hotel_idhotel_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('hotel_idhotel_seq', 5, true);


--
-- Data for Name: pago; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY pago (idpago, idcliente, monto, cupon, total) FROM stdin;
\.


--
-- Name: pago_idpago_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('pago_idpago_seq', 1, false);


--
-- Data for Name: pais; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY pais (idpais, nombre) FROM stdin;
2	Brazil
3	Mexico
4	Argentina
5	Canada
6	Chile
\.


--
-- Name: pais_idpais_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('pais_idpais_seq', 6, true);


--
-- Data for Name: reserva; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY reserva (idreserva, costo, fecha) FROM stdin;
\.


--
-- Name: reserva_idreserva_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('reserva_idreserva_seq', 1, false);


--
-- Data for Name: suite; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY suite (idsuite, clase, precio, numsuite) FROM stdin;
1	Primera Clase	50000	1
2	Segunda Clase	30000	10
3	Tercera Clase	10000	100
\.


--
-- Name: suite_idsuite_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('suite_idsuite_seq', 3, true);


--
-- Data for Name: tarifa; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY tarifa (idtarifa, clase, precio) FROM stdin;
1	Primera Clase	2000
2	Turista	1500
3	Negocios	1800
\.


--
-- Name: tarifa_idtarifa_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('tarifa_idtarifa_seq', 3, true);


--
-- Data for Name: vuelo; Type: TABLE DATA; Schema: public; Owner: topicos_web
--

COPY vuelo (idvuelo, idcliente, cupon, total, iddisponibles) FROM stdin;
42	23	0.00200000000000000004	4	1
44	24	0.800000000000000044	1600	1
46	25	0	2000	1
\.


--
-- Name: vuelo_idvuelo_seq; Type: SEQUENCE SET; Schema: public; Owner: topicos_web
--

SELECT pg_catalog.setval('vuelo_idvuelo_seq', 46, true);


--
-- Name: aeropuertopk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY aeropuerto
    ADD CONSTRAINT aeropuertopk PRIMARY KEY (idaeropuerto);


--
-- Name: asiento_pkey; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY asiento
    ADD CONSTRAINT asiento_pkey PRIMARY KEY (idasiento);


--
-- Name: avionpk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY avion
    ADD CONSTRAINT avionpk PRIMARY KEY (idavion);


--
-- Name: clientepk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY cliente
    ADD CONSTRAINT clientepk PRIMARY KEY (idcliente);


--
-- Name: disponiblespk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblespk PRIMARY KEY (iddisponibles);


--
-- Name: hospedajepk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajepk PRIMARY KEY (idhospedaje, idsuite, idhotel, idcliente);


--
-- Name: hotelpk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY hotel
    ADD CONSTRAINT hotelpk PRIMARY KEY (idhotel);


--
-- Name: pago_pkey; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY pago
    ADD CONSTRAINT pago_pkey PRIMARY KEY (idpago);


--
-- Name: paispk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY pais
    ADD CONSTRAINT paispk PRIMARY KEY (idpais);


--
-- Name: reserva_pkey; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY reserva
    ADD CONSTRAINT reserva_pkey PRIMARY KEY (idreserva);


--
-- Name: suitepk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY suite
    ADD CONSTRAINT suitepk PRIMARY KEY (idsuite);


--
-- Name: tarifapk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY tarifa
    ADD CONSTRAINT tarifapk PRIMARY KEY (idtarifa);


--
-- Name: vuelopk; Type: CONSTRAINT; Schema: public; Owner: topicos_web; Tablespace: 
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelopk PRIMARY KEY (idvuelo);


--
-- Name: idx_f4df5f3e2b18c94b; Type: INDEX; Schema: public; Owner: topicos_web; Tablespace: 
--

CREATE INDEX idx_f4df5f3e2b18c94b ON pago USING btree (idcliente);


--
-- Name: aeropuertofk; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY aeropuerto
    ADD CONSTRAINT aeropuertofk FOREIGN KEY (idpais) REFERENCES pais(idpais);


--
-- Name: disponiblesfk; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk FOREIGN KEY (idorigen) REFERENCES aeropuerto(idaeropuerto);


--
-- Name: disponiblesfk2; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk2 FOREIGN KEY (iddestino) REFERENCES aeropuerto(idaeropuerto);


--
-- Name: disponiblesfk3; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk3 FOREIGN KEY (idtarifa) REFERENCES tarifa(idtarifa);


--
-- Name: disponiblesfk4; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY disponibles
    ADD CONSTRAINT disponiblesfk4 FOREIGN KEY (idavion) REFERENCES avion(idavion);


--
-- Name: fk_f4df5f3e2b18c94b; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY pago
    ADD CONSTRAINT fk_f4df5f3e2b18c94b FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- Name: hospedajefk; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk FOREIGN KEY (idsuite) REFERENCES suite(idsuite);


--
-- Name: hospedajefk2; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk2 FOREIGN KEY (idhotel) REFERENCES hotel(idhotel);


--
-- Name: hospedajefk3; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY hospedaje
    ADD CONSTRAINT hospedajefk3 FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- Name: vuelofk; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelofk FOREIGN KEY (iddisponibles) REFERENCES disponibles(iddisponibles);


--
-- Name: vuelofk5; Type: FK CONSTRAINT; Schema: public; Owner: topicos_web
--

ALTER TABLE ONLY vuelo
    ADD CONSTRAINT vuelofk5 FOREIGN KEY (idcliente) REFERENCES cliente(idcliente);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

