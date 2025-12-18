--
-- PostgreSQL database dump
--

\restrict 3WfasOmaYbyTTAacd2wuPyKRi6Vs12fLesRLWFgk2wRygygmiaprDu81Y4AohWk

-- Dumped from database version 15.15 (Debian 15.15-1.pgdg13+1)
-- Dumped by pg_dump version 15.15 (Debian 15.15-1.pgdg13+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id bigint NOT NULL,
    sigla character varying(255) NOT NULL,
    nome character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_id_seq OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;


--
-- Name: doacao_item; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doacao_item (
    id bigint NOT NULL,
    doacao_id bigint NOT NULL,
    item_id bigint NOT NULL,
    quantidade integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.doacao_item OWNER TO postgres;

--
-- Name: doacao_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.doacao_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.doacao_item_id_seq OWNER TO postgres;

--
-- Name: doacao_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.doacao_item_id_seq OWNED BY public.doacao_item.id;


--
-- Name: doacoes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doacoes (
    id bigint NOT NULL,
    organizacao_id bigint NOT NULL,
    doador_id bigint NOT NULL,
    status character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.doacoes OWNER TO postgres;

--
-- Name: doacoes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.doacoes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.doacoes_id_seq OWNER TO postgres;

--
-- Name: doacoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.doacoes_id_seq OWNED BY public.doacoes.id;


--
-- Name: doadores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doadores (
    id bigint NOT NULL,
    nome character varying(255) NOT NULL,
    documento character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    telefone character varying(255) NOT NULL,
    endereco character varying(255) NOT NULL,
    cidade character varying(255) NOT NULL,
    estado character varying(255) NOT NULL,
    cep character varying(255) NOT NULL,
    documento_tipo character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.doadores OWNER TO postgres;

--
-- Name: doadores_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.doadores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.doadores_id_seq OWNER TO postgres;

--
-- Name: doadores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.doadores_id_seq OWNED BY public.doadores.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: itens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.itens (
    id bigint NOT NULL,
    nome character varying(255) NOT NULL,
    descricao character varying(255),
    categoria_id bigint NOT NULL,
    unidade character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.itens OWNER TO postgres;

--
-- Name: itens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.itens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.itens_id_seq OWNER TO postgres;

--
-- Name: itens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.itens_id_seq OWNED BY public.itens.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: media; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.media (
    id bigint NOT NULL,
    model_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    type character varying(255) DEFAULT 'image'::character varying NOT NULL,
    source character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.media OWNER TO postgres;

--
-- Name: media_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.media_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.media_id_seq OWNER TO postgres;

--
-- Name: media_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.media_id_seq OWNED BY public.media.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: organizacoes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.organizacoes (
    id bigint NOT NULL,
    razao character varying(255) NOT NULL,
    documento character varying(255) NOT NULL,
    user_id bigint NOT NULL,
    telefone character varying(255) NOT NULL,
    endereco character varying(255) NOT NULL,
    cidade character varying(255) NOT NULL,
    estado character varying(255) NOT NULL,
    cep character varying(255) NOT NULL,
    documento_tipo character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.organizacoes OWNER TO postgres;

--
-- Name: organizacoes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.organizacoes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.organizacoes_id_seq OWNER TO postgres;

--
-- Name: organizacoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.organizacoes_id_seq OWNED BY public.organizacoes.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name text NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    id bigint NOT NULL,
    nome text NOT NULL,
    descricao text NOT NULL,
    qtd_estoque integer NOT NULL,
    preco double precision NOT NULL,
    importado boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produtos_id_seq OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: subcategorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subcategorias (
    id bigint NOT NULL,
    categoria_id bigint NOT NULL,
    sigla character varying(255) NOT NULL,
    nome character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.subcategorias OWNER TO postgres;

--
-- Name: subcategorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.subcategorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.subcategorias_id_seq OWNER TO postgres;

--
-- Name: subcategorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.subcategorias_id_seq OWNED BY public.subcategorias.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL,
    is_donor boolean DEFAULT false NOT NULL,
    is_organization boolean DEFAULT false NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: categorias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);


--
-- Name: doacao_item id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacao_item ALTER COLUMN id SET DEFAULT nextval('public.doacao_item_id_seq'::regclass);


--
-- Name: doacoes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacoes ALTER COLUMN id SET DEFAULT nextval('public.doacoes_id_seq'::regclass);


--
-- Name: doadores id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doadores ALTER COLUMN id SET DEFAULT nextval('public.doadores_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: itens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens ALTER COLUMN id SET DEFAULT nextval('public.itens_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: media id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.media ALTER COLUMN id SET DEFAULT nextval('public.media_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: organizacoes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizacoes ALTER COLUMN id SET DEFAULT nextval('public.organizacoes_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: subcategorias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subcategorias ALTER COLUMN id SET DEFAULT nextval('public.subcategorias_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, sigla, nome, created_at, updated_at) FROM stdin;
1	RINF	Roupa Infantil	2025-12-10 02:59:37	2025-12-10 02:59:37
3	HIGI	Higiene Íntima	2025-12-10 02:59:37	2025-12-10 02:59:37
4	HIGB	Higiene Bucal	2025-12-10 02:59:37	2025-12-10 02:59:37
2	ANPER	Alimento Não Perecível	2025-12-10 02:59:37	2025-12-15 13:55:18
6	RADU	Roupas Adulto	2025-12-15 14:28:30	2025-12-15 14:28:30
\.


--
-- Data for Name: doacao_item; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doacao_item (id, doacao_id, item_id, quantidade, created_at, updated_at) FROM stdin;
1	1	40	22	2025-12-10 02:59:38	2025-12-10 02:59:38
2	1	22	59	2025-12-10 02:59:38	2025-12-10 02:59:38
5	3	6	47	2025-12-10 02:59:38	2025-12-10 02:59:38
6	4	15	15	2025-12-10 02:59:38	2025-12-10 02:59:38
7	4	14	85	2025-12-10 02:59:38	2025-12-10 02:59:38
8	4	30	91	2025-12-10 02:59:38	2025-12-10 02:59:38
10	4	10	33	2025-12-10 02:59:38	2025-12-10 02:59:38
11	5	19	14	2025-12-10 02:59:38	2025-12-10 02:59:38
13	5	33	30	2025-12-10 02:59:38	2025-12-10 02:59:38
14	6	37	84	2025-12-10 02:59:38	2025-12-10 02:59:38
15	6	18	76	2025-12-10 02:59:38	2025-12-10 02:59:38
16	6	1	84	2025-12-10 02:59:38	2025-12-10 02:59:38
17	7	38	32	2025-12-10 02:59:38	2025-12-10 02:59:38
24	10	35	80	2025-12-10 02:59:38	2025-12-10 02:59:38
25	10	13	16	2025-12-10 02:59:38	2025-12-10 02:59:38
28	12	9	5	2025-12-10 02:59:38	2025-12-10 02:59:38
30	13	21	8	2025-12-10 02:59:38	2025-12-10 02:59:38
37	16	12	16	2025-12-10 02:59:38	2025-12-10 02:59:38
38	16	40	12	2025-12-10 02:59:38	2025-12-10 02:59:38
39	16	6	25	2025-12-10 02:59:38	2025-12-10 02:59:38
41	17	28	26	2025-12-10 02:59:38	2025-12-10 02:59:38
42	18	19	54	2025-12-10 02:59:38	2025-12-10 02:59:38
43	18	20	38	2025-12-10 02:59:38	2025-12-10 02:59:38
45	19	10	48	2025-12-10 02:59:38	2025-12-10 02:59:38
46	20	38	5	2025-12-10 02:59:38	2025-12-10 02:59:38
47	20	25	99	2025-12-10 02:59:38	2025-12-10 02:59:38
50	21	34	11	2025-12-10 02:59:38	2025-12-10 02:59:38
53	21	6	13	2025-12-10 02:59:38	2025-12-10 02:59:38
54	22	11	92	2025-12-10 02:59:38	2025-12-10 02:59:38
55	22	19	9	2025-12-10 02:59:38	2025-12-10 02:59:38
56	23	33	96	2025-12-10 02:59:38	2025-12-10 02:59:38
57	23	39	40	2025-12-10 02:59:38	2025-12-10 02:59:38
59	25	6	97	2025-12-10 02:59:38	2025-12-10 02:59:38
60	25	14	32	2025-12-10 02:59:38	2025-12-10 02:59:38
61	25	22	44	2025-12-10 02:59:38	2025-12-10 02:59:38
62	25	34	2	2025-12-10 02:59:38	2025-12-10 02:59:38
63	25	40	75	2025-12-10 02:59:38	2025-12-10 02:59:38
64	26	7	62	2025-12-10 02:59:38	2025-12-10 02:59:38
66	26	13	57	2025-12-10 02:59:38	2025-12-10 02:59:38
67	26	31	26	2025-12-10 02:59:38	2025-12-10 02:59:38
68	27	6	40	2025-12-10 02:59:38	2025-12-10 02:59:38
71	28	15	16	2025-12-10 02:59:38	2025-12-10 02:59:38
73	28	8	28	2025-12-10 02:59:38	2025-12-10 02:59:38
74	29	20	35	2025-12-10 02:59:38	2025-12-10 02:59:38
78	29	30	28	2025-12-10 02:59:38	2025-12-10 02:59:38
79	30	21	99	2025-12-10 02:59:38	2025-12-10 02:59:38
80	30	2	42	2025-12-10 02:59:38	2025-12-10 02:59:38
81	31	22	58	2025-12-10 02:59:38	2025-12-10 02:59:38
83	32	30	42	2025-12-10 02:59:38	2025-12-10 02:59:38
85	32	36	33	2025-12-10 02:59:38	2025-12-10 02:59:38
86	33	26	94	2025-12-10 02:59:38	2025-12-10 02:59:38
87	33	8	29	2025-12-10 02:59:38	2025-12-10 02:59:38
88	33	30	38	2025-12-10 02:59:38	2025-12-10 02:59:38
89	33	14	57	2025-12-10 02:59:38	2025-12-10 02:59:38
90	33	9	89	2025-12-10 02:59:38	2025-12-10 02:59:38
92	34	10	15	2025-12-10 02:59:38	2025-12-10 02:59:38
93	34	9	28	2025-12-10 02:59:38	2025-12-10 02:59:38
95	35	18	83	2025-12-10 02:59:38	2025-12-10 02:59:38
96	36	8	63	2025-12-10 02:59:38	2025-12-10 02:59:38
97	36	1	62	2025-12-10 02:59:38	2025-12-10 02:59:38
99	37	12	52	2025-12-10 02:59:38	2025-12-10 02:59:38
100	37	7	63	2025-12-10 02:59:38	2025-12-10 02:59:38
101	37	19	85	2025-12-10 02:59:38	2025-12-10 02:59:38
102	37	29	97	2025-12-10 02:59:38	2025-12-10 02:59:38
103	37	33	29	2025-12-10 02:59:38	2025-12-10 02:59:38
106	39	31	76	2025-12-10 02:59:38	2025-12-10 02:59:38
108	39	30	7	2025-12-10 02:59:38	2025-12-10 02:59:38
109	40	15	65	2025-12-10 02:59:38	2025-12-10 02:59:38
110	40	6	79	2025-12-10 02:59:38	2025-12-10 02:59:38
111	40	10	19	2025-12-10 02:59:38	2025-12-10 02:59:38
112	40	18	91	2025-12-10 02:59:38	2025-12-10 02:59:38
113	40	26	9	2025-12-10 02:59:38	2025-12-10 02:59:38
119	43	32	74	2025-12-10 02:59:38	2025-12-10 02:59:38
120	43	40	35	2025-12-10 02:59:38	2025-12-10 02:59:38
121	43	13	2	2025-12-10 02:59:38	2025-12-10 02:59:38
123	44	34	9	2025-12-10 02:59:38	2025-12-10 02:59:38
124	45	6	61	2025-12-10 02:59:38	2025-12-10 02:59:38
125	45	11	46	2025-12-10 02:59:38	2025-12-10 02:59:38
126	45	7	99	2025-12-10 02:59:38	2025-12-10 02:59:38
127	46	39	41	2025-12-10 02:59:38	2025-12-10 02:59:38
129	47	18	61	2025-12-10 02:59:38	2025-12-10 02:59:38
130	47	14	72	2025-12-10 02:59:38	2025-12-10 02:59:38
131	47	13	78	2025-12-10 02:59:38	2025-12-10 02:59:38
132	47	32	40	2025-12-10 02:59:38	2025-12-10 02:59:38
133	48	26	22	2025-12-10 02:59:38	2025-12-10 02:59:38
135	48	39	1	2025-12-10 02:59:38	2025-12-10 02:59:38
136	48	6	79	2025-12-10 02:59:38	2025-12-10 02:59:38
139	49	23	21	2025-12-10 02:59:38	2025-12-10 02:59:38
140	49	14	73	2025-12-10 02:59:38	2025-12-10 02:59:38
\.


--
-- Data for Name: doacoes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doacoes (id, organizacao_id, doador_id, status, created_at, updated_at) FROM stdin;
1	8	5	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
2	9	1	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
3	3	1	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
4	6	11	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
5	8	6	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
6	7	5	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
7	5	1	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
9	5	7	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
10	8	6	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
12	11	6	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
13	8	11	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
16	7	4	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
17	6	5	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
18	3	8	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
19	7	11	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
20	6	5	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
21	11	5	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
22	6	9	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
23	11	8	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
24	9	7	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
25	2	3	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
26	9	9	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
27	4	4	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
28	9	11	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
29	6	9	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
30	2	8	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
31	2	3	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
32	7	6	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
33	11	4	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
34	9	10	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
35	10	11	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
36	4	8	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
37	3	4	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
39	6	7	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
40	6	1	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
42	11	7	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
43	3	4	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
44	3	5	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
45	10	3	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
46	5	5	Pendente	2025-12-10 02:59:37	2025-12-10 02:59:37
47	3	3	Cancelada	2025-12-10 02:59:37	2025-12-10 02:59:37
48	8	6	Confirmada	2025-12-10 02:59:37	2025-12-10 02:59:37
49	5	11	Concluída	2025-12-10 02:59:37	2025-12-10 02:59:37
\.


--
-- Data for Name: doadores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doadores (id, nome, documento, user_id, telefone, endereco, cidade, estado, cep, documento_tipo, created_at, updated_at) FROM stdin;
3	Mr. Curtis Gibson III	0774788609187	4	53968581409	8907 Tristian Loop Apt. 252	Port Hectortown	NJ	85037540	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
4	Anne McClure	6897100442886	5	53926924795	869 Eli Mountains	Auerton	NY	41067393	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
5	Lori Armstrong	4814746205452	6	53927622127	438 Deborah Port	Heidenreichview	MA	55837140	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
6	Dusty Hirthe	0510865861910	7	53946946807	7183 Jasen Groves	Gaylordmouth	UT	88067132	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
7	Ms. Iliana Smitham III	2206661075369	8	53958595793	874 Lavina Centers	North Dawsonport	VT	97985471	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
8	Antonio Kiehn DDS	7981952986991	9	53943019144	47639 Langworth Fort Suite 921	Brionnashire	SC	84342951	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
9	Prof. Cale Hamill	0946388437178	10	53932245688	7615 Carroll Crossing Suite 745	Abernathyport	TN	27389244	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
10	Lester Willms	9821560529351	11	53960443109	53706 Quitzon Via	Hermannville	MD	19634462	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
11	Mrs. Beth Cronin	3529224653187	12	53984579462	167 Irwin Forks	Port Emilie	CT	29909578	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
13	Mariano Gomes	02013456798	31	12934561486	Rua JK	Pelotas	RS	94501234	PF	2025-12-15 02:22:28	2025-12-15 02:22:28
1	Paulo Roberto Rosa	02010447000	2	53984561498	Rua João Jacob	Pelotas	RS	96065340	PF	2025-12-10 02:59:37	2025-12-15 03:49:40
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.itens (id, nome, descricao, categoria_id, unidade, created_at, updated_at) FROM stdin;
1	sapiente	Voluptatem porro corrupti rerum vel consequatur nostrum.	1	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
6	aut	Facilis voluptate harum libero ut.	1	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
7	aut	Quia voluptatum fugiat repellendus numquam.	1	L	2025-12-10 02:59:37	2025-12-10 02:59:37
8	quis	Est dicta et ea at reiciendis a impedit.	1	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
9	et	Alias quia voluptatibus magni quam quo blanditiis.	1	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
10	ea	Quos voluptatem maxime adipisci sunt.	1	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
11	totam	Ea doloribus non qui odio quos rerum.	2	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
12	aperiam	Nam et et maxime sunt laboriosam laborum tenetur voluptate.	2	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
13	ea	Dolores molestiae ut dolore expedita.	2	L	2025-12-10 02:59:37	2025-12-10 02:59:37
14	qui	Sint at et laboriosam voluptas cum aut esse.	2	L	2025-12-10 02:59:37	2025-12-10 02:59:37
15	ullam	Quis est veniam et similique.	2	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
16	voluptatem	Qui quo est animi quo qui placeat.	2	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
17	ut	Rerum consequuntur est accusamus perspiciatis sed.	2	L	2025-12-10 02:59:37	2025-12-10 02:59:37
18	ab	Quaerat vitae quia quisquam odio sint inventore non est.	2	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
19	voluptatum	Sit tempora possimus facere fugit impedit beatae.	2	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
20	non	Repellendus velit voluptates nemo est.	2	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
21	rerum	Rerum et voluptas numquam dolores perspiciatis magnam soluta dolore.	3	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
22	dolor	Recusandae eum in voluptates.	3	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
23	fugiat	Mollitia molestiae blanditiis quibusdam harum architecto.	3	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
24	facere	Labore et magni magnam exercitationem ad assumenda.	3	L	2025-12-10 02:59:37	2025-12-10 02:59:37
25	enim	Sed qui libero quos sint dignissimos et eveniet qui.	3	L	2025-12-10 02:59:37	2025-12-10 02:59:37
26	explicabo	Ad nam quidem eos et architecto est.	3	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
27	atque	Et enim et velit mollitia ea nisi ad.	3	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
28	veritatis	Nulla enim rerum voluptatem.	3	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
29	dolore	Ut omnis pariatur fugiat necessitatibus velit iusto sit.	3	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
30	expedita	Nam possimus aut quo qui facilis aspernatur.	3	KG	2025-12-10 02:59:37	2025-12-10 02:59:37
31	voluptas	Soluta totam odio molestias molestiae.	4	L	2025-12-10 02:59:37	2025-12-10 02:59:37
32	aliquam	Architecto dolorum et esse ut ut.	4	L	2025-12-10 02:59:37	2025-12-10 02:59:37
33	quidem	Animi quis recusandae sed temporibus.	4	L	2025-12-10 02:59:37	2025-12-10 02:59:37
34	et	Recusandae at tenetur accusamus.	4	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
35	nihil	Illo voluptate sapiente qui velit et.	4	L	2025-12-10 02:59:37	2025-12-10 02:59:37
36	non	Omnis dolor autem aut dolorum.	4	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
37	itaque	Quidem voluptas dolore perspiciatis.	4	UN	2025-12-10 02:59:37	2025-12-10 02:59:37
38	eos	Optio quasi aut autem fugiat animi.	4	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
39	at	Iste in illum quis.	4	PÇ	2025-12-10 02:59:37	2025-12-10 02:59:37
40	deserunt	Eligendi enim tenetur ad quas velit qui ipsum.	4	L	2025-12-10 02:59:37	2025-12-10 02:59:37
51	Arroz	Tipo 1	2	KG	2025-12-10 02:59:38	2025-12-10 02:59:38
53	Feijão	Preto	1	Kg	2025-12-10 04:03:11	2025-12-10 04:03:11
2	Massa	Espaguete	1	PC	2025-12-10 02:59:37	2025-12-14 16:14:04
55	Body	TAM 2	1	UN	2025-12-14 22:43:15	2025-12-14 22:43:15
57	Leite	Integral	2	Lt	2025-12-15 15:36:44	2025-12-15 15:36:44
58	Leite	Integral	2	LT	2025-12-15 15:38:45	2025-12-15 15:38:45
59	Leite	Integral	2	LT	2025-12-15 15:43:54	2025-12-15 15:43:54
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: media; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.media (id, model_id, model_type, type, source, created_at, updated_at) FROM stdin;
1	16	App\\Models\\Item	video	https://www.youtube.com/watch?v=QAfTYrDhdHE	2025-12-10 02:59:38	2025-12-10 02:59:38
2	16	App\\Models\\Item	video	https://www.youtube.com/watch?v=5s-_SnVl-1g	2025-12-10 02:59:38	2025-12-10 02:59:38
3	9	App\\Models\\Doador	video	https://www.youtube.com/watch?v=127ng7botO4	2025-12-10 02:59:38	2025-12-10 02:59:38
4	9	App\\Models\\Doador	video	https://www.youtube.com/watch?v=veSLRzmOfAI	2025-12-10 02:59:38	2025-12-10 02:59:38
5	53	App\\Models\\Item	image	lLhbTRbujmMNquS2CB5ULqHO2QPe1zl0zzomaJbj.webp	2025-12-10 04:03:11	2025-12-10 04:03:11
6	57	App\\Models\\Item	image	lkK5ih0spU8cs0q3MXz4am3foZuLaAHwKtYsOUUy.jpg	2025-12-15 15:36:45	2025-12-15 15:36:45
7	58	App\\Models\\Item	image	M0T4TyzP4775FNTDUCKskv3H6JX9vraUdlsigxZp.jpg	2025-12-15 15:38:45	2025-12-15 15:38:45
8	59	App\\Models\\Item	image	xapkPdBGYORgZXoFA6mTKnXP8XvvfuaBXBDinLQL.jpg	2025-12-15 15:43:54	2025-12-15 15:43:54
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_09_30_202718_create_produtos_table	1
5	2025_10_01_161706_create_doadores_table	1
6	2025_10_22_142700_create_categorias_table	1
7	2025_10_22_150225_create_subcategorias_table	1
8	2025_10_22_150610_create_itens_table	1
9	2025_11_05_201215_create_personal_access_tokens_table	1
10	2025_12_02_175044_create_organizacoes_table	1
11	2025_12_02_175045_create_doacoes_table	1
12	2025_12_03_221050_create_media_table	1
13	2025_12_04_164928_create_doacao_item_table	1
\.


--
-- Data for Name: organizacoes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.organizacoes (id, razao, documento, user_id, telefone, endereco, cidade, estado, cep, documento_tipo, created_at, updated_at) FROM stdin;
1	Sociedade União	02104480000182	13	53984561490	Rua J.	Pelotas	RS	96065345	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
2	Pascale Buckridge	7983653768911	14	53953483617	90821 Raphael Union Apt. 191	Port Johnnie	CT	07745684	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
3	Kayley Schinner	9115234723440	15	53935766326	272 Runte Key Suite 449	Amayatown	HI	48129857	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
4	Mr. Orville Mayert	4576012299640	16	53956953192	276 Zieme Hill Apt. 579	West Hope	MI	07698390	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
5	Mrs. Adell Jenkins	8374334619433	17	53953077810	98102 Trudie Place Apt. 551	West Samsonmouth	NC	91716327	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
6	Sadye Monahan MD	4246473591186	18	53918331039	265 Sven Summit Apt. 461	Ofeliahaven	WA	21260998	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
7	Maddison Emmerich IV	2432634482580	19	53926311658	887 Ariane Ford Apt. 620	Pagacchester	MD	85034866	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
8	Dedrick Frami	6031107199727	20	53981431386	1389 Janae Forges	Cliftonside	MS	85003796	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
9	Lora Tromp	8232355958910	21	53972930678	1374 Sigurd Inlet Apt. 691	Ornfort	NE	49911288	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
10	Heather Towne	3557724711812	22	53920766070	747 Marcella Islands Apt. 934	Lake Telly	MS	57451725	PF	2025-12-10 02:59:37	2025-12-10 02:59:37
11	Angela Davis	0210524351062	23	53900737816	390 Lind Isle	South Leannehaven	TN	31530231	PJ	2025-12-10 02:59:37	2025-12-10 02:59:37
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
16	App\\Models\\User	1	admin@admin.com	46134f40f38916975e7bb51fc40f89762cd42b3b597c7247659e7eddc5f204bd	["is-admin"]	\N	\N	2025-12-18 11:35:46	2025-12-18 11:35:46
17	App\\Models\\User	1	admin@admin.com	d68bdb86e8d56150bcb7018f1b536bef93d469a91d7d5ff5862f2395bd0b48a4	["is-admin"]	\N	\N	2025-12-18 11:35:53	2025-12-18 11:35:53
6	App\\Models\\User	25	bancodealimentos@teste.com	e34607908d4311e328242aeb5b5260bd0b7d507386382ed3db35c7847ef49b12	["is-organization"]	2025-12-10 05:30:44	\N	2025-12-10 05:21:28	2025-12-10 05:30:44
7	App\\Models\\User	1	admin@admin.com	9c6b21b89442817334a5395301b203b6f614e043510b39010b9fddbdfaef4ade	["is-admin"]	\N	\N	2025-12-14 00:32:49	2025-12-14 00:32:49
9	App\\Models\\User	25	bancodealimentos@teste.com	d2e36809ee5caa39942352a4c1ab4879fad70e719557b1ef856ecac2c011c3fb	["is-organization"]	\N	\N	2025-12-14 00:39:51	2025-12-14 00:39:51
12	App\\Models\\User	1	admin@admin.com	862aaffcf0548306e3b80b7e0d77787c51eb09e417d1bb772421dd4187d97a07	["is-admin"]	2025-12-14 22:43:52	\N	2025-12-14 12:59:41	2025-12-14 22:43:52
10	App\\Models\\User	1	admin@admin.com	2bf1d00b8b128a184bed1377c76f925440435b39c4c79fb3a896b2197e7354d8	["is-admin"]	2025-12-15 15:35:06	\N	2025-12-14 00:40:10	2025-12-15 15:35:06
13	App\\Models\\User	1	admin@admin.com	271b30e424bfc69a40d564b25e1e20da3ac5065d2b87b43aca4175b2c96d099e	["is-admin"]	2025-12-15 18:33:13	\N	2025-12-15 02:35:54	2025-12-15 18:33:13
8	App\\Models\\User	1	admin@admin.com	58626143fbf88dca722f8b8a0cf015ccd846a99a4ebd85cb76f0ddaac3248e18	["is-admin"]	2025-12-14 01:26:36	\N	2025-12-14 00:32:52	2025-12-14 01:26:36
11	App\\Models\\User	1	admin@admin.com	178551610483c99d7924306085c1e0a86e833524d1e8a0227342d37cdb6d3053	["is-admin"]	\N	\N	2025-12-14 12:22:32	2025-12-14 12:22:32
5	App\\Models\\User	25	bancodealimentos@teste.com	be5ec861aa7cce614d7545f227738036d6e6f3392800f00b5480b92d38375641	["is-organization"]	2025-12-10 05:17:45	\N	2025-12-10 04:59:09	2025-12-10 05:17:45
14	App\\Models\\User	1	admin@admin.com	cc35fbc467270d37f191048883fa43e6edca731bbe1cd8b85611d774b8dc0636	["is-admin"]	2025-12-15 21:43:37	\N	2025-12-15 18:46:51	2025-12-15 21:43:37
15	App\\Models\\User	1	admin@admin.com	b2d0d73ae4f27a6da2a8d3dc8c4635601c6b3348c7af260e892bfa1100cee3bb	["is-admin"]	2025-12-16 01:33:47	\N	2025-12-16 01:24:26	2025-12-16 01:33:47
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (id, nome, descricao, qtd_estoque, preco, importado, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- Data for Name: subcategorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.subcategorias (id, categoria_id, sigla, nome, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, email, email_verified_at, password, is_admin, is_donor, is_organization, remember_token, created_at, updated_at) FROM stdin;
1	admin@admin.com	2025-12-10 02:59:36	$2y$12$G3o07s6typ9dUiAYtWtUKeyMgVoWWSfZp8cQcqmMPL8JQ.Oo2wez.	t	f	f	g1EDJq39I6	2025-12-10 02:59:36	2025-12-10 02:59:36
2	paulo.rosa@teste.com	\N	$2y$12$kz3cFVl8tMZGPNcwaW5KKOCchUi0mZQXq1YjmN2niYQ50DI2kdAgi	f	t	f	\N	2025-12-10 02:59:37	2025-12-10 02:59:37
4	erna.hintz@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	sUXmE8eZnb	2025-12-10 02:59:37	2025-12-10 02:59:37
5	goyette.josefa@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	KvZZlmoSqb	2025-12-10 02:59:37	2025-12-10 02:59:37
6	mchristiansen@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	x0U3kidGWj	2025-12-10 02:59:37	2025-12-10 02:59:37
7	hglover@example.com	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	ROmQylgmms	2025-12-10 02:59:37	2025-12-10 02:59:37
8	cary.mosciski@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	uzKpad5SIW	2025-12-10 02:59:37	2025-12-10 02:59:37
9	huel.josefina@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	0ui01fKG56	2025-12-10 02:59:37	2025-12-10 02:59:37
10	lroob@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	o6pA9rjjeJ	2025-12-10 02:59:37	2025-12-10 02:59:37
11	lacy86@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	4w9qbHMbRf	2025-12-10 02:59:37	2025-12-10 02:59:37
12	cecilia.bechtelar@example.com	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	t	f	mKxvtxoUwc	2025-12-10 02:59:37	2025-12-10 02:59:37
13	sociedade.uniao@teste.com	\N	$2y$12$TvSFGXWX7pEPY4TjerjlUeupMV17H8q1XK2ucd4PSUWmYCax2tNaC	f	f	t	\N	2025-12-10 02:59:37	2025-12-10 02:59:37
14	luettgen.ova@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	i16TrCPtiU	2025-12-10 02:59:37	2025-12-10 02:59:37
15	tdibbert@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	LfIQOgIb1F	2025-12-10 02:59:37	2025-12-10 02:59:37
16	trunolfsdottir@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	8AtOsFdQSA	2025-12-10 02:59:37	2025-12-10 02:59:37
17	claire.wehner@example.com	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	EGf3D8tnQf	2025-12-10 02:59:37	2025-12-10 02:59:37
18	hessel.ansley@example.com	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	MEpXALBeWj	2025-12-10 02:59:37	2025-12-10 02:59:37
19	sschmitt@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	RHkRITIuCs	2025-12-10 02:59:37	2025-12-10 02:59:37
20	ohegmann@example.org	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	PvD5qpwSJ3	2025-12-10 02:59:37	2025-12-10 02:59:37
21	abosco@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	wABiCJIXgA	2025-12-10 02:59:37	2025-12-10 02:59:37
22	holly29@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	mahkeNifOZ	2025-12-10 02:59:37	2025-12-10 02:59:37
23	pleuschke@example.net	2025-12-10 02:59:37	$2y$12$SSoqeduXKtvGwGEAwv.5D.dDBRRNGwR3DOLjDM8bmy02UlWKSuSdq	f	f	t	4SZlrsjMKX	2025-12-10 02:59:37	2025-12-10 02:59:37
24	marcospereira@teste.com	\N	$2y$12$Q5J5yI2ANFLIE2NMuCo5T.tQq96V8rRWIJsYU9mY9.e9nSD8rEcUC	f	t	f	\N	2025-12-10 04:32:15	2025-12-10 04:32:15
25	bancodealimentos@teste.com	\N	$2y$12$RNkI2zKejOUxdhI8XbmiSuqlTdO9orzL1CzyTSuB2uGU5XEaU5lFS	f	f	t	\N	2025-12-10 04:48:40	2025-12-10 04:48:40
26	mnunes@teste.com	\N	$2y$12$iiNRn3QrXM6Mz0jSZKhHfO7QbRvWlhY1Z69WPG6OIrvLxml7N4Db2	f	t	f	\N	2025-12-15 01:27:41	2025-12-15 01:27:41
27	mari@teste.com	\N	$2y$12$fM.jTBgR6QLPYAaJXOP9SulBX9CyWjjnYE28rHYWaMAKnXO5HXkBC	f	t	f	\N	2025-12-15 01:30:46	2025-12-15 01:30:46
28	marte@teste.com	\N	$2y$12$hs8oO0U57uK/1HP5TaM2ZefrJFCnuny8wWJZM6zK4i7aifPyHuwNu	f	t	f	\N	2025-12-15 01:34:04	2025-12-15 01:34:04
29	msilva@teste.com	\N	$2y$12$TtGDnGcpBo368hOhmbQKE.9UcO4qUud7.uZF8df06F5AvDievHcXS	f	t	f	\N	2025-12-15 01:38:00	2025-12-15 01:38:00
30	msilvatst@teste.com	\N	$2y$12$oCumivUabSNbI2PVgl3x.eEot14tRYQ4Qopx2XZDJgDip6m/YycXO	f	t	f	\N	2025-12-15 01:41:16	2025-12-15 01:41:16
31	mariano@teste.com	\N	$2y$12$.oEHd77PArtccur5yCetGOFEFHuVjEae7r9srplhoSbK4Kwii12oy	f	t	f	\N	2025-12-15 02:22:25	2025-12-15 02:22:25
\.


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 6, true);


--
-- Name: doacao_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.doacao_item_id_seq', 141, true);


--
-- Name: doacoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.doacoes_id_seq', 50, true);


--
-- Name: doadores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.doadores_id_seq', 13, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: itens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.itens_id_seq', 59, true);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: media_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.media_id_seq', 8, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);


--
-- Name: organizacoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.organizacoes_id_seq', 14, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 17, true);


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_id_seq', 1, false);


--
-- Name: subcategorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.subcategorias_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 31, true);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: categorias categorias_sigla_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_sigla_unique UNIQUE (sigla);


--
-- Name: doacao_item doacao_item_doacao_id_item_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacao_item
    ADD CONSTRAINT doacao_item_doacao_id_item_id_unique UNIQUE (doacao_id, item_id);


--
-- Name: doacao_item doacao_item_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacao_item
    ADD CONSTRAINT doacao_item_pkey PRIMARY KEY (id);


--
-- Name: doacoes doacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacoes
    ADD CONSTRAINT doacoes_pkey PRIMARY KEY (id);


--
-- Name: doadores doadores_documento_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doadores
    ADD CONSTRAINT doadores_documento_unique UNIQUE (documento);


--
-- Name: doadores doadores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doadores
    ADD CONSTRAINT doadores_pkey PRIMARY KEY (id);


--
-- Name: doadores doadores_user_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doadores
    ADD CONSTRAINT doadores_user_id_unique UNIQUE (user_id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: itens itens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_pkey PRIMARY KEY (id);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: media media_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.media
    ADD CONSTRAINT media_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: organizacoes organizacoes_documento_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizacoes
    ADD CONSTRAINT organizacoes_documento_unique UNIQUE (documento);


--
-- Name: organizacoes organizacoes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizacoes
    ADD CONSTRAINT organizacoes_pkey PRIMARY KEY (id);


--
-- Name: organizacoes organizacoes_user_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizacoes
    ADD CONSTRAINT organizacoes_user_id_unique UNIQUE (user_id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: subcategorias subcategorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subcategorias
    ADD CONSTRAINT subcategorias_pkey PRIMARY KEY (id);


--
-- Name: subcategorias subcategorias_sigla_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subcategorias
    ADD CONSTRAINT subcategorias_sigla_unique UNIQUE (sigla);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: personal_access_tokens_expires_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_expires_at_index ON public.personal_access_tokens USING btree (expires_at);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: doacao_item doacao_item_doacao_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacao_item
    ADD CONSTRAINT doacao_item_doacao_id_foreign FOREIGN KEY (doacao_id) REFERENCES public.doacoes(id) ON DELETE CASCADE;


--
-- Name: doacao_item doacao_item_item_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacao_item
    ADD CONSTRAINT doacao_item_item_id_foreign FOREIGN KEY (item_id) REFERENCES public.itens(id) ON DELETE CASCADE;


--
-- Name: doacoes doacoes_doador_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacoes
    ADD CONSTRAINT doacoes_doador_id_foreign FOREIGN KEY (doador_id) REFERENCES public.doadores(id) ON DELETE CASCADE;


--
-- Name: doacoes doacoes_organizacao_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doacoes
    ADD CONSTRAINT doacoes_organizacao_id_foreign FOREIGN KEY (organizacao_id) REFERENCES public.organizacoes(id) ON DELETE CASCADE;


--
-- Name: doadores doadores_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doadores
    ADD CONSTRAINT doadores_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: itens itens_categoria_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_categoria_id_foreign FOREIGN KEY (categoria_id) REFERENCES public.categorias(id) ON DELETE CASCADE;


--
-- Name: organizacoes organizacoes_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.organizacoes
    ADD CONSTRAINT organizacoes_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: subcategorias subcategorias_categoria_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subcategorias
    ADD CONSTRAINT subcategorias_categoria_id_foreign FOREIGN KEY (categoria_id) REFERENCES public.categorias(id);


--
-- PostgreSQL database dump complete
--

\unrestrict 3WfasOmaYbyTTAacd2wuPyKRi6Vs12fLesRLWFgk2wRygygmiaprDu81Y4AohWk

